<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
define("BASE_URL", "http://localhost:8888/FinalYearProject/FinalYearProject/");
?>