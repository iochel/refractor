<!--login-page.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
        <p><?php echo $_GET['error'] ?></p>
        <?php } ?>
        <label>Proceed with Email:</label>
        <input type="email" name="email" placeholder="email">
        <button type="submit">Enter</button>
    </form>
</body>
</html>
