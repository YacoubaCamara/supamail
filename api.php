<?php

session_start();


require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register(function ($class) {
    include __DIR__ . "/src/$class.php";
});

$uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode("/", $uri);


$collection_resources = 0;
if (empty($collection_resources)) {
    $collection_resources = $uri_parts[3];
} else {
    $collection_resources = $uri_parts[4];
}

if (empty($uri_parts[5])) {
    $id = null;
} else {
    $id = $uri_parts[5];
}
$method = $_SERVER['REQUEST_METHOD'];
echo $method;

echo "Collection Resource: " . $collection_resources;

$pdo = '';
try {
    $pdo = new PDO("mysql:host=". $_ENV["DATABASE_HOSTNAME"] . ";dbname=" . $_ENV["DATABASE_NAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_STRINGIFY_FETCHES => false]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



function getInbox(): array
{
    global $pdo;
    $recipient = $_SESSION['email'];
    $sql = ("SELECT sender, recipient, subject, message  FROM sent_emails WHERE recipient = '$recipient'");
        $stmt = $pdo->query($sql);
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $data[] = $row;
           print_r($data);
        }

    return $data;
}

function getSentEmails(): array
{
    global $pdo;
    $sender = $_SESSION['email'];

    $sql = ("SELECT sender, recipient, subject, message  FROM sent_emails WHERE sender = '$sender'");

    $stmt = $pdo->query($sql);
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
        print_r($data);
    }
    return $data;
}

function handleSendEmails(): void
{
    global $pdo, $uri_parts;
    $sender = $_SESSION['email'];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($uri_parts);
        $recipient = $_POST['recipient'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sql = "INSERT INTO inbox (sender, recipient, subject, message) VALUES (:sender, :recipient, :subject, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sender', $sender);
        $stmt->bindParam(':recipient', $recipient);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        if($stmt->execute()) {
            echo 'sent';
        } else {
            echo 'error';
        }
        $sql = "INSERT INTO sent_emails (sender, recipient, subject, message) VALUES (:sender, :recipient, :subject, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':sender', $sender);
        $stmt->bindParam(':recipient', $recipient);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        if($stmt->execute()) {
            echo 'sent';
            header('location: includes/admin.php');
        } else {
            echo 'error';
        }
    }
}

function handleLoginRequest(): void {
    global $pdo;
    $message = '';
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
        header('Location: includes/admin.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $input_email = htmlspecialchars($_POST['email']);
        $input_password = htmlspecialchars($_POST['password']);
        $email = '';
        $password = '';

        $sql = "SELECT * FROM login WHERE email = '$input_email' LIMIT 1";
        $stmt = $pdo->query($sql);
        if($stmt->rowCount() == 1) {
            $email = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($input_password, $email['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $email['email'];
                setcookie('last_logged_in', time(), time() + (86400 * 30), "/");
                header('Location: includes/admin.php');
                exit();
            } else {
                $message = "Wrong password";
            }
        } else {
            $message = "Wrong email";
        }
    }
}

function handleRegisterRequest(): void {
    global $pdo;
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = htmlspecialchars($_POST['first_name']);
        $lastname = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        // Checking password confirmation
        if ($password != $confirm_password) {
            $error = "Passwords do not match";
        }
        // Insert data into database
        else {
            $sql = "INSERT INTO user_info (first_name, last_name, email) VALUES (:firstname, :lastname, :email);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $sql = "INSERT INTO login (email, password) VALUES (:email, :password_hashed);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hashed', $password_hashed);
            if ($stmt->execute()) {
                header('Location: includes/login.php');
            } else {
                $error = 'Email already taken';
            }
        }
    }
}

function handleLogoutRequest(): void {
    if(isset($_POST['logout'])) {
        $_SESSION = [];
        session_destroy();
        header('Location: includes/login.php');
        exit();
    } elseif(isset($_POST['stay_logged_in'])) {
        header('Location: includes/admin.php');
    }
}
function handleAdminRequest(): void
{
    if ($_SESSION['logged_in'] === false) {
        header('Location: includes/login.php');
    } elseif($_SESSION['logged_in'] === true) {
        global $uri_parts;
        if (isset($_COOKIE['last_logged_in'])) {
            date_default_timezone_set("Canada/Atlantic");
            $last_logged_in = date('Y M D \a\t h:i:s:A', $_COOKIE['last_logged_in']);
            echo 'Last logged in: ' . $last_logged_in;
            header('Location: includes/admin.php');
        }
    }
}



//echo 'collection_resources: ' . $collection_resources . '<br>';
//echo 'id: ' . $id . '<br>';
    header('Content-Type: application/json');

//Collection Request (meaning where there's no id)
    switch ($method) {
        case 'GET':
            if ($collection_resources == 'inbox.php') {
                json_encode(getInbox());
                break;
            } elseif ($collection_resources == 'sent_emails.php') {
                echo json_encode(getSentEmails());
                break;
            } elseif ($collection_resources == 'admin.php') {
                handleAdminRequest();
                break;
            }
        case 'POST':
            if (isset($_POST['send_email_request'])) {
                handleSendEmails();
                break;
            } elseif (isset($_POST['login'])) {
                handleLoginRequest();
                break;
            } elseif (isset($_POST['register'])) {
                handleRegisterRequest();
                break;
            } elseif (isset($_POST['logout_request'])) {
                handleLogoutRequest();
                break;
            }
        default:
            echo 'Default';
    }





