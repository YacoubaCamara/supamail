<?php
//require '../templates/header.php';
session_start(); // Start the session
// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
    if (isset($_COOKIE['last_logged_in'])) {
        date_default_timezone_set("Canada/Atlantic");
        $last_logged_in = date('Y M D \a\t h:i:s:A', $_COOKIE['last_logged_in']);
        echo 'Last logged in: ' . $last_logged_in;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img class="" src="../assets/img/logo.svg" alt="" width="75" height="75">
            <span class="fs-3">SupaMail</span>
        </a>

        <ul class="nav nav-pills" style="margin-top: 15px">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin</a></li>
            <li class="nav-item"><a href="inbox.php" class="nav-link">Inbox</a></li>
            <li class="nav-item"><a href="sent_emails.php" class="nav-link">Sent Emails</a></li>
            <li class="nav-item"><a href="send_email.php" class="nav-link">Send Email</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
    </header>
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">What you can do!</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center   fs-2 mb-3">
                <img class="" src="../assets/img/send.png" alt="" width="75" height="75">
            </div>
            <h3 class="fs-2 text-body-emphasis">Send Email</h3>
            <p>Send an email</p>
            <a href="./send_email.php" class="icon-link">
                Click to send email
                <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
            </a>
        </div>
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center   fs-2 mb-3">
                <img class="" src="../assets/img/inbox.png" alt="" width="75" height="75">
            </div>
            <h3 class="fs-2 text-body-emphasis">View Inbox</h3>
            <p>View the list of emails you received</p>
            <a href="inbox.php" class="icon-link">
                Click to view Inbox
                <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
            </a>
        </div>
        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center   fs-2 mb-3">
                <img class="" src="../assets/img/sent.png" alt="" width="75" height="75">
            </div>
            <h3 class="fs-2 text-body-emphasis">View Emails Sent</h3>
            <p>View the emails you sent</p>
            <a href="./sent_emails.php" class="icon-link">
                Click to view the emails you sent
                <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
            </a>
        </div>
    </div>
</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">© 2025 SupaMail, Inc</p>

        <a href="admin.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" aria-label="Bootstrap">
            <img class="" src="../assets/img/logo.svg" alt="" width="75" height="75">
        </a>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin</a></li>
            <li class="nav-item"><a href="inbox.php" class="nav-link">Inbox</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
    </footer>
</div>
</body>
</html>