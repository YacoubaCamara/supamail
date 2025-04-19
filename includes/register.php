<?php
require '../templates/header.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div style="position: relative; bottom: 70px" class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Join our Email App</h1>
            <p class="col-lg-10 fs-4">Thanks for taking the time to consider joining our app. You're not wasting your time!</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form action="../api.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <div class="form-floating mb-3">
                    <input type="text" name="first_name" class="form-control" id="first-name-input" placeholder="first name" required>
                    <label for="first-name-input">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="last_name" class="form-control" id="last-name-input" placeholder="last name" required>
                    <label for="last-name-input">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email-input" placeholder="name@example.com" required>
                    <label for="email-input">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password-input" placeholder="Password" required>
                    <label for="password-input">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirm_password" class="form-control" id="confirm-password-input" placeholder="Password" required>
                    <label for="confirm-password-input">Password</label>
                </div>
                <input type="hidden" name="register" value="register_function">
                <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign Up"></input>
                <hr class="my-4">
                <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<?php
require '../templates/footer.php';
?>
</body>
</html>