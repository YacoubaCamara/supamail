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
    <title>Login</title>
</head>
<body>
<div style="height: 70vh" class="modal modal-sheet position-static d-block bg-body-secondary p-2 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2 ">Login</h1>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="../api.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="floatingInput" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
<!--                        <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">-->
                        <input type="password"  class="form-control rounded-3" id="password-input" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input type="hidden" name="login" value="login_request">
                    <input type="submit" value="Login" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<?php
require '../templates/footer.php';
?>
</body>
</html>