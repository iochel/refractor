<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

if (isset($_GET['quest'])){
    $_SESSION['another-question'] = $_GET['quest'];
}

if (isset($_POST['pin-num'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $pin = validate($_POST['pin-num']);
    $email = $_SESSION['email']; // Retrieving the email from the session

    if (empty($pin)) {
        header("Location: enter-pin.php?error=PIN is required");
    } elseif (!ctype_digit($pin)) {
        header("Location: enter-pin.php?error=PIN should contain numbers only");
    } elseif (strlen($pin) !== 4) {
        header("Location: enter-pin.php?error=PIN should be 4 digits");
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($_SESSION['another-question']) {
                unset($_SESSION['another-question']);
                $_SESSION['new-acc'] = false;
                header("Location: proceed-to-q.php");
            } else {
                header("Location: view-results.php");
            }
        } else {
            header("Location: enter-pin.php?error=Incorrect PIN");
        }
    }
} else {
    header("Location: enter-pin.php");
    exit();
}
?>
