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

$query = "DELETE FROM $table WHERE id = $id";

if ($conn->query($query) === TRUE) {
    echo "<script>alert('Transaksi berhasil dihapus!'); window.location.href='admin_transaction.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
?>
