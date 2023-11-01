<?php 

if (isset($_POST['close'])) {
    header("Location: index.php");
    exit(); 
}
if (isset($_POST['viewResult'])) {
    header("Location: enter-pin.php");
}
if (isset($_POST['another-response'])) {
    header("Location: enter-pin.php?quest=true");
}
?>