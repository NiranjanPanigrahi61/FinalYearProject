<?php
include_once 'dbconnect.php';
session_start();

if (!isset($_SESSION['user_id'])) exit;

$userid = $_SESSION['user_id'];

if ($_POST['action'] === 'addAddress') {
    $stmt = $conn->prepare("INSERT INTO address (userid, delivery_address, landmark, city, state, pincode, country, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssiss", $userid, $_POST['delivery_address'], $_POST['landmark'], $_POST['city'], $_POST['state'], $_POST['pincode'], $_POST['country'], $_POST['type']);
    $stmt->execute();
    exit;
}

if ($_POST['action'] === 'getAddress') {
    $result = $conn->prepare("SELECT * FROM address WHERE userid = ?");
    $result->bind_param("i", $userid);
    $result->execute();
    $res = $result->get_result();

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo '<div class="address-card">
                    <h5><span class="address-type">' . htmlspecialchars($row['type']) . '</span> Address</h5>
                    <p class="mb-1">' . nl2br(htmlspecialchars($row['delivery_address'])) . '</p>
                    <p class="text-muted mb-1">' . 
                      (htmlspecialchars($row['landmark']) ? htmlspecialchars($row['landmark']) . ', ' : '') . 
                      htmlspecialchars($row['city']) . ', ' . 
                      htmlspecialchars($row['state']) . ', ' . 
                      htmlspecialchars($row['pincode']) . ', ' . 
                      htmlspecialchars($row['country']) . '</p>
                    <div class="mt-2">
                      <button class="btn btn-sm btn-outline-secondary me-2 edit-btn" data-id="' . $row['id'] . '">✏️ Edit</button>
                      <button class="btn btn-sm btn-outline-danger delete-btn" data-id="' . $row['id'] . '">🗑️ Delete</button>
                    </div>
                  </div>';
        }
    } else {
        echo '<div class="text-center text-muted py-4">No addresses found. Please add one.</div>';
    }
    exit;
}

if ($_POST['action'] === 'getAddressDetails') {
    $stmt = $conn->prepare("SELECT * FROM address WHERE id = ? AND userid = ?");
    $stmt->bind_param("ii", $_POST['id'], $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    }
    exit;
}

if ($_POST['action'] === 'updateAddress') {
    $stmt = $conn->prepare("UPDATE address SET delivery_address = ?, landmark = ?, city = ?, state = ?, pincode = ?, country = ?, type = ? WHERE id = ? AND userid = ?");
    $stmt->bind_param("ssssissii", $_POST['delivery_address'], $_POST['landmark'], $_POST['city'], $_POST['state'], $_POST['pincode'], $_POST['country'], $_POST['type'], $_POST['id'], $userid);
    $stmt->execute();
    exit;
}

if ($_POST['action'] === 'deleteAddress') {
    $stmt = $conn->prepare("DELETE FROM address WHERE id = ? AND userid = ?");
    $stmt->bind_param("ii", $_POST['id'], $userid);
    $stmt->execute();
    exit;
}