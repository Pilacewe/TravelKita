<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini!'); window.location.href='login.php';</script>";
    exit();
}

include '../html/db_connect.php';

$id = $_GET['id'];
$type = $_GET['type'];
$table = '';

if ($type == 'hotel') {
    $table = 'history_transaction_hotel';
} elseif ($type == 'pesawat') {
    $table = 'history_transaction_pesawat';
} elseif ($type == 'kereta') {
    $table = 'history_transaction_kereta';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses update data
    $fields = [];
    foreach ($_POST as $key => $value) {
        $fields[] = "$key = '$value'";
    }
    $fields_str = implode(',', $fields);
    $query = "UPDATE $table SET $fields_str WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Transaksi berhasil diupdate!'); window.location.href='admin_transaction.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch current data
$query = "SELECT * FROM $table WHERE id = $id";
$result = $conn->query($query);
$transaction = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaction</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Transaction</h2>
        <form method="POST">
            <?php foreach ($transaction as $key => $value): ?>
                <div class="form-group">
                    <label><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                    <input type="text" name="<?= $key ?>" class="form-control" value="<?= htmlspecialchars($value) ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="admin_transaction.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
