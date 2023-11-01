<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

$email = $_SESSION['email'];

$sql = "SELECT user_id FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Assign the query result to the $row variable
    $user_id = $row['user_id']; // Retrieve the user_id from the $row variable
} else {
    //handle error
}

$conn->close();
?>
