<?php
session_start();

// Security: Prevent JavaScript from accessing the session cookie
ini_set('session.cookie_httponly', 1);

// Regenerate session ID for security
session_regenerate_id(true);

// Destroy all session data
$_SESSION = [];
setcookie(session_name(), '', time() - 3600, '/'); // Delete session cookie
session_destroy();

// Redirect to login page
header("Location:home.php");
exit();
?>
