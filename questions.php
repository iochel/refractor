<?php 
    session_start();
    if (isset($_POST['pass'])) {
        $pin = $_POST['pass'];
        if (empty($pin)) {
            header("Location: new-acc.php?error=PIN is required.");
        } else {
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $age = $_POST['age'];

            // Check if age is empty
            if (empty($age)) {
                header("Location: new-acc.php?error=Age is required.");
                exit;
            }

            // Validate age
            if (!is_numeric($age)) {
                header("Location: new-acc.php?error=Age should be a number.");
                exit;
            } elseif ($age < 0) {
                header("Location: new-acc.php?error=Age cannot be below 0.");
                exit;
            } elseif ($age > 150) {
                header("Location: new-acc.php?error=Age cannot exceed 150.");
                exit;
            }

            // If all validations pass, store data in session and proceed
            $_SESSION['new-acc'] = true;
            $_SESSION['first'] = $f_name;
            $_SESSION['last'] = $l_name;
            $_SESSION['age'] = $age;
            $_SESSION['pass-pin'] = $pin; // Storing the pin in session
            header("Location: proceed-to-q.php");
        }
    }
    if (isset($_POST['cancel'])) {
        header("Location: login-page.php");
    }
?>

