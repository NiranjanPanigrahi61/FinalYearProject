<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    userSignUp();
}

function userSignUp(){
    global $conn;
    // Get form data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 


    if (emailExists($email,$phone)) {
        echo json_encode(["success" => false, "message" => "Email already exists!"]);
        exit;
    }
    // Call addUser function
    $status = addUser($name, $email, $phone, $password);
    if ($status) {
        echo json_encode(["success" => true, "message" => "Signup successful! Redirecting to login page..."]);
    } else {
        echo json_encode(["success" => false, "message" => "Signup failed. Email may already exist."]);
    }
}

// Function to add a new user
function addUser($name, $email, $phone, $password) {
    global $conn;
    try {
        $qry = "INSERT INTO user (name, phone, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ssss", $name,$phone, $email, $password);

        $status = $stmt->execute();
        return $status;
    } catch (Exception $e) {
        return false;
    } finally {
        $conn->close();
    }
}

// function addUser($name, $email, $phone, $password) {
//     global $conn;
//     try {
//         $qry = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
//         $stmt = $conn->prepare($qry);
//         $stmt->bind_param("ssss", $name, $email, $phone, $password);

//         $status = $stmt->execute();
//         if (!$status) {
//             echo json_encode(["success" => false, "message" => "Database Insert Error: " . $stmt->error]);
//         }
//         return $status;
//     } catch (Exception $e) {
//         echo json_encode(["success" => false, "message" => "Exception: " . $e->getMessage()]);
//         return false;
//     } finally {
//         $stmt->close();
//     }
// }



// Function to check if email exists
function emailExists($email,$phone) {
    global $conn;
    $qry = "SELECT email,phone FROM user WHERE email = ? OR phone=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("ss", $email,$phone);
    $stmt->execute();
    $stmt->store_result();
    $exists = $stmt->num_rows > 0;
    $stmt->close();
    return $exists;
}

// Function to validate user login securely
// function loginUser($email, $password) {
//     global $conn;
//     try {
//         $qry = "SELECT * FROM users WHERE email = ?";
//         $stmt = $conn->prepare($qry);
//         $stmt->bind_param("s", $email);
//         $stmt->execute();

//         $result = $stmt->get_result();
//         if ($result->num_rows > 0) {
//             $user = $result->fetch_assoc();

//             // Verify the hashed password
//             if (password_verify($password, $user['password'])) {
//                 return $user; // Login successful
//             }
//         }
//         return false; // Login failed
//     } catch (Exception $e) {
//         return false;
//     } finally {
//         $stmt->close();
//     }
// }

// Function to delete a user by ID
// function deleteUser($id) {
//     global $conn;
//     try {
//         $qry = "DELETE FROM users WHERE id = ?";
//         $stmt = $conn->prepare($qry);
//         $stmt->bind_param("i", $id);

//         $status = $stmt->execute();
//         return $status;
//     } catch (Exception $e) {
//         return false;
//     } finally {
//         $stmt->close();
//     }
// }

// Function to update user details
// function updateUser($id, $name, $email, $phone) {
//     global $conn;
//     try {
//         $qry = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
//         $stmt = $conn->prepare($qry);
//         $stmt->bind_param("sssi", $name, $email, $phone, $id);

//         $status = $stmt->execute();
//         return $status;
//     } catch (Exception $e) {
//         return false;
//     } finally {
//         $stmt->close();
//     }
// }

// Function to fetch all users
// function displayUsers() {
//     global $conn;
//     try {
//         $qry = "SELECT * FROM users";
//         $stmt = $conn->prepare($qry);
//         $stmt->execute();

//         $result = $stmt->get_result();
//         return $result->num_rows > 0 ? $result : false;
//     } catch (Exception $e) {
//         return false;
//     } finally {
//         $stmt->close();
//     }
// }

// Handle signup request

?>

