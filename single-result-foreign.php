<?php 
require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

if (isset($_SESSION['fk-user-id'])) {
    $fk = $_SESSION['fk-user-id'];
}

$sql = "SELECT * FROM result WHERE user_id = '$fk' ORDER BY result_id DESC LIMIT 1";
$result = $conn->query($sql);

$conn->close(); 
?>
