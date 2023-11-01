<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_GET['error'])) { ?>
    <p><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <form action="check-pin.php<?php if(isset($_GET['quest'])) { echo '?quest='.$_GET['quest']; } ?>" method="post">
        <label>Please Enter Your PIN:</label>
        <input type="password" name="pin-num" placeholder="4 Digit PIN">
        <button type="submit">Enter</button>
    </form>
</body>
</html>
