<?php
session_start();
session_unset();
session_destroy();

// Optional: Redirect after a few seconds or send a response if using AJAX
header("Location: ../pages/home.php"); // change this path if your login page is located somewhere else
exit();
?>
