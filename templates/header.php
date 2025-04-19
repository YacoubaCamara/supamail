<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img class="" src="../assets/img/logo.svg" alt="" width="75" height="75">
            <span class="fs-3">SupaMail</span>
        </a>

        <ul class="nav nav-pills" style="margin-top: 15px">


            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Inbox</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Sent Emails</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Send Email</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
            <?php endif; ?>
        </ul>
    </header>
</div>
