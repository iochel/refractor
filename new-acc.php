<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="questions.php" method="POST">
        <?php if (isset($_GET['error'])) { ?>
        <p><?php echo $_GET['error'] ?></p>
        <?php } ?>
        <input type="text" name="f_name" placeholder="First Name (optional)">
        <input type="text" name="l_name" placeholder="Last Name (optional)">
        <input type="text" name="age" placeholder="Age">
        <input type="password" name="pass" placeholder="PIN (4 numbers)" >
        <button type="submit">Submit</button>
        <button type="submit" name="cancel">Cancel</button>
    </form>
</body>
</html>