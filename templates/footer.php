<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">© 2025 SupaMail, Inc</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" aria-label="Bootstrap">
            <img class="" src="../assets/img/logo.svg" alt="" width="75" height="75">
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
    </footer>
</div>