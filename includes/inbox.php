<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';


// ✅ Then load .env variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));

$dotenv->load();
$host = $_ENV["DATABASE_HOSTNAME"];
$user = $_ENV["DATABASE_USERNAME"];
$password = $_ENV["DATABASE_PASSWORD"];
$database = $_ENV["DATABASE_NAME"];

$pdo = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password, [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_STRINGIFY_FETCHES => false
    ]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

global $pdo;
$recipient = $_SESSION['email'];

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';

$sql = ("SELECT sender, recipient, subject, message FROM sent_emails WHERE recipient = :recipient");
$stmt = $pdo->prepare($sql);
$stmt->execute(['recipient' => $recipient]);
$data = [];

echo '<div class="container mt-5">';

// Back to Admin Button
echo '<div class="mb-4">';
echo '<a href="admin.php" class="btn btn-secondary">&larr; Back to Admin Panel</a>';
echo '</div>';

echo '<h2 class="mb-4">Inbox</h2>';

echo '<div class="row row-cols-1 row-cols-md-2 g-4">';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="col">';
    echo '<div class="card shadow-sm">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">Subject: ' . htmlspecialchars($row['subject']) . '</h5>';
    echo '<h6 class="card-subtitle mb-2 text-muted">From: ' . htmlspecialchars($row['sender']) . '</h6>';
    echo '<p class="card-text"><strong>To:</strong> ' . htmlspecialchars($row['recipient']) . '</p>';
    echo '<p class="card-text">' . nl2br(htmlspecialchars($row['message'])) . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    $data[] = $row;
}

// Close email cards
echo '</div>';
echo '</div>'; // Close container
?>
