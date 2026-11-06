<?php include 'db_connect.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['id'])) {
    header('Location: history.blade.php');
    exit();
}

$id = (int)$_GET['id'];

$query = "DELETE FROM history_transaction_hotel WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: history.blade.php');
    exit();
}

$stmt->close();
?>
