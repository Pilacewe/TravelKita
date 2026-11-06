<?php
include 'navbar.php'; // Menyertakan file navbar.php untuk menampilkan navbar
include 'db_connect.php'; // Menyertakan file db_connect.php untuk menghubungkan ke database

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi jika belum dimulai
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Mendapatkan ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $airline = $_POST['airline'];
    $destination = $_POST['destination'];
    $customer_name = $_POST['customer_name'];
    $seats = (int)$_POST['seats'];
    $price = (int)$_POST['price'];
    $total_price = $price * $seats;

    // Mempersiapkan query untuk memperbarui data transaksi pesawat
    $sql = "UPDATE history_transaction_pesawat SET airline = ?, destination = ?, customer_name = ?, seats = ?, price = ?, total_price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiii", $airline, $destination, $customer_name, $seats, $price, $total_price, $id);

    // Mengeksekusi query dan memeriksa hasilnya
    if ($stmt->execute()) {
        header("Location: history.blade.php"); // Redirect ke halaman history setelah update berhasil
        exit;
    } else {
        echo "Error: " . $conn->error; // Menampilkan pesan kesalahan jika update gagal
    }
} else {
    // Mempersiapkan query untuk mengambil data transaksi pesawat berdasarkan ID
    $sql = "SELECT * FROM history_transaction_pesawat WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc(); // Mengambil data transaksi
}

$conn->close(); // Menutup koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi Pesawat</title>
    <link rel="stylesheet" href="../css/pesawat.css"> <!-- Menyertakan file CSS eksternal untuk gaya tambahan -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap"> <!-- Menyertakan Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap CSS untuk gaya -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Transaksi Pesawat</h1> <!-- Judul halaman -->
        <form method="POST"> <!-- Form untuk mengedit data transaksi pesawat -->
            <div class="mb-3">
                <label for="airline" class="form-label">Merek Pesawat</label>
                <input type="text" class="form-control" id="airline" name="airline" value="<?= htmlspecialchars($transaction['airline']) ?>" required> <!-- Input untuk merek pesawat -->
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">Tujuan Destinasi</label>
                <input type="text" class="form-control" id="destination" name="destination" value="<?= htmlspecialchars($transaction['destination']) ?>" required> <!-- Input untuk tujuan destinasi -->
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= htmlspecialchars($transaction['customer_name']) ?>" required> <!-- Input untuk nama customer -->
            </div>
            <div class="mb-3">
                <label for="seats" class="form-label">Jumlah Bangku</label>
                <input type="number" class="form-control" id="seats" name="seats" value="<?= $transaction['seats'] ?>" min="1" required> <!-- Input untuk jumlah bangku -->
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga per Bangku</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $transaction['price'] ?>" required> <!-- Input untuk harga per bangku -->
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk mengirim form -->
            <a href="history.blade.php" class="btn btn-secondary">Batal</a> <!-- Tombol untuk membatalkan pengeditan dan kembali ke halaman history -->
        </form>
    </div>

    <?php include 'footer.php'; ?> <!-- Menyertakan file footer.php -->
</body>
</html>
