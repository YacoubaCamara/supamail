<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Sending Email</title>
</head>
<body>
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2 ">Send an Email</h1>
                <a href="admin.php" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="../api.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" id="recipient_input" name="recipient">
                        <label for="recipient_input">Recipient</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="subject_input" name="subject">
                        <label for="subject_input">Subject</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="message_input" name="message">
                        <label for="message_input">Message</label>
                    </div>
                    <input type="hidden" name="send_email_request" value="function">
                    <input type="submit" value="Send" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>
