<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Email Interface App</title>
</head>
<body>
    <div class="container">
    <h2 class="title">Email Interface App</h2>

    <a href="../includes/register.php">Register</a><br><br>


    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>

        <a href="../includes/admin.php">Admin</a><br><br>
    <a href="../includes/logout.php">Logout</a>


    <?php else: ?>

        <a href="../includes/login.php">Login</a>

    <?php endif; ?>
    </div>
</body>
</html>