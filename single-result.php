<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

$conn->close(); 
}
