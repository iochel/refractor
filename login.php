<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

if (isset($_POST['email'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);

    if (empty($email)) {
        header("Location: login-page.php?error=Username is required");
    } else {
        $_SESSION['email'] = $email;
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            header("Location: used-acc.php");
        } else {
            header("Location: new-acc.php");
        }
    }
} else {
    header("Location: login-page.php");
    exit();
}
?>
