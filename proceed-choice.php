<?php 

if (isset($_POST['yes'])) {
    header("Location: answers.php");
    exit(); 
}
if (isset($_POST['no'])) {
    header("Location: new-acc.php");
    exit();
}
?>