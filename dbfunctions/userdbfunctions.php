<?php
require_once "dbconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle SignUp or Login based on POST data
    if (isset($_POST['username']) && isset($_POST['phone'])) {
        userSignUp();
    } elseif (isset($_POST['email']) && isset($_POST['password'])) {
        userLogin();
    }
}

// ======================= USER SIGNUP ======================= //
function userSignUp() {
    global $conn;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];  // Plain-text password
    $dob = $_POST['dob'] ?? null;    // New field (DOB)

    if (emailExists($email, $phone)) {
        echo json_encode(["success" => false, "message" => "Email or phone already exists!"]);
        exit;
    }

    $status = addUser($username, $email, $phone, $password, $dob);
    if ($status) {
        echo json_encode(["success" => true, "message" => "Signup successful! Redirecting to login page..."]);
    } else {
        echo json_encode(["success" => false, "message" => "Signup failed. Try again later."]);
    }
}

function addUser($username, $email, $phone, $password, $dob) {
    global $conn;

    try {
        $qry = "INSERT INTO user (username, phone, email, password, dob) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("sssss", $username, $phone, $email, $password, $dob);

        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}

function emailExists($email, $phone) {
    global $conn;

    $qry = "SELECT email, phone FROM user WHERE email = ? OR phone = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $stmt->store_result();

    $exists = $stmt->num_rows > 0;
    $stmt->close();

    return $exists;
}

// ======================= USER LOGIN ======================= //
function userLogin() {
    global $conn;

    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $qry = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $_SESSION['user_id'] = $user['userid'];
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid email or password."]);
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "An error occurred while logging in."]);
    }
}
?>
