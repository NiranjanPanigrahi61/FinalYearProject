<?php
session_start();
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

require_once "dbconnect.php"; // Adjust path as needed to connect to your DB

$user_id = $_SESSION['user_id'];

// Handle POST request for different actions
$action = $_POST['action'] ?? '';

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

// Function to get all addresses for the logged-in user
if ($action == 'get_all') {
    getAllAddresses($user_id);
    exit;
}

// Function to get a single address by ID
if ($action == 'get_single') {
    $address_id = intval($_POST['address_id']);
    getSingleAddress($user_id, $address_id);
    exit;
}

// Function to add a new address
if ($action == 'add') {
    $address = sanitize($_POST['address']);
    $landmark = sanitize($_POST['landmark']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $postalCode = sanitize($_POST['postalCode']);
    $country = sanitize($_POST['country']);
    $type = sanitize($_POST['type']);

    addAddress($user_id, $address, $landmark, $city, $state, $postalCode, $country, $type);
    exit;
}

// Function to update an existing address
if ($action == 'update') {
    $address_id = intval($_POST['address_id']);
    $address = sanitize($_POST['address']);
    $landmark = sanitize($_POST['landmark']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $postalCode = sanitize($_POST['postalCode']);
    $country = sanitize($_POST['country']);
    $type = sanitize($_POST['type']);

    updateAddress($user_id, $address_id, $address, $landmark, $city, $state, $postalCode, $country, $type);
    exit;
}

// Function to delete an address
if ($action == 'delete') {
    $address_id = intval($_POST['address_id']);
    deleteAddress($user_id, $address_id);
    exit;
}

// Function to get all addresses
function getAllAddresses($user_id) {
    global $conn;
    $sql = "SELECT address_id, delivery_address, landmark, city, state, pincode, country, type 
            FROM user_addresses WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $addresses = [];
    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row;
    }
    echo json_encode(['success' => true, 'data' => $addresses]);
}

// Function to get a single address by ID
function getSingleAddress($user_id, $address_id) {
    global $conn;
    $sql = "SELECT address_id, delivery_address, landmark, city, state, pincode, country, type 
            FROM user_addresses WHERE user_id = ? AND address_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $address_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        echo json_encode(['success' => true, 'data' => $row]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Address not found']);
    }
}

// Function to add a new address
function addAddress($user_id, $address, $landmark, $city, $state, $postalCode, $country, $type) {
    global $conn;

    $sql = "INSERT INTO user_addresses (user_id, delivery_address, landmark, city, state, pincode, country, type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $user_id, $address, $landmark, $city, $state, $postalCode, $country, $type);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Address added successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add address']);
    }
}

// Function to update an existing address
function updateAddress($user_id, $address_id, $address, $landmark, $city, $state, $postalCode, $country, $type) {
    global $conn;

    $sql = "UPDATE user_addresses SET delivery_address=?, landmark=?, city=?, state=?, pincode=?, country=?, type=?
            WHERE address_id=? AND user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssii", $address, $landmark, $city, $state, $postalCode, $country, $type, $address_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Address updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update address']);
    }
}

// Function to delete an address
function deleteAddress($user_id, $address_id) {
    global $conn;

    $sql = "DELETE FROM user_addresses WHERE address_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $address_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Address deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete address']);
    }
}

?>
