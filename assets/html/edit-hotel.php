<?php
// Menyertakan file navbar.php untuk menampilkan navbar
include 'navbar.php';

// Menyertakan file db_connect.php untuk menghubungkan ke database
include 'db_connect.php';

// Memeriksa apakah sesi belum dimulai dan memulai sesi jika diperlukan
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Mendapatkan ID transaksi dari parameter URL
$id = $_GET['id'];

// Mempersiapkan statement SQL untuk memilih transaksi hotel berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM history_transaction_hotel WHERE id = ?");
$stmt->bind_param("i", $id); // Mengikat parameter ID dengan tipe data integer
$stmt->execute(); // Menjalankan statement
$result = $stmt->get_result(); // Mendapatkan hasil dari statement
$transaction = $result->fetch_assoc(); // Mengambil hasil sebagai array asosiatif
$stmt->close(); // Menutup statement

// Memeriksa apakah form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $total_price = $_POST['total_price'];

    // Mempersiapkan statement SQL untuk memperbarui transaksi hotel berdasarkan ID
    $stmt = $conn->prepare("UPDATE history_transaction_hotel SET nama_lengkap = ?, nohp = ?, alamat = ?, checkin_date = ?, checkout_date = ?, total_price = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $nama_lengkap, $nohp, $alamat, $checkin_date, $checkout_date, $total_price, $id); // Mengikat parameter dengan tipe data yang sesuai

    // Menjalankan statement dan memeriksa apakah berhasil
    if ($stmt->execute()) {
        // Jika berhasil, mengarahkan pengguna kembali ke halaman history
        header("Location: history.blade.php");
        exit();
    }
    $stmt->close(); // Menutup statement
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Hotel Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap CSS untuk gaya -->
</head>
<body>
    <div class="container">
        <h2>Edit Hotel Transaction</h2>
        <!-- Form untuk mengedit transaksi hotel -->
        <form method="POST">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Full Name</label>
                <!-- Input untuk nama lengkap -->
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($transaction['nama_lengkap']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">Phone Number</label>
                <!-- Input untuk nomor telepon -->
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= htmlspecialchars($transaction['nohp']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Address</label>
                <!-- Textarea untuk alamat -->
                <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($transaction['alamat']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="checkin_date" class="form-label">Check-in Date</label>
                <!-- Input untuk tanggal check-in -->
                <input type="date" class="form-control" id="checkin_date" name="checkin_date" value="<?= htmlspecialchars($transaction['checkin_date']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="checkout_date" class="form-label">Check-out Date</label>
                <!-- Input untuk tanggal check-out -->
                <input type="date" class="form-control" id="checkout_date" name="checkout_date" value="<?= htmlspecialchars($transaction['checkout_date']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <!-- Input untuk total harga yang hanya bisa dibaca -->
                <input type="text" class="form-control" id="total_price" name="total_price" value="<?= htmlspecialchars($transaction['total_price']) ?>" readonly>
            </div>
            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <?php include 'footer.php'; ?> <!-- Menyertakan file footer.php -->
</body>
</html>
