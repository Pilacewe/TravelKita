<?php include 'navbar.php'; ?> <!-- Menyertakan file navbar.php untuk menampilkan navbar -->
<?php include 'db_connect.php'; ?> <!-- Menyertakan file db_connect.php untuk menghubungkan ke database -->

<?php
// Memeriksa apakah sesi belum dimulai dan memulai sesi jika diperlukan
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa apakah parameter ID ada dalam URL
if (!isset($_GET['id'])) {
    // Jika tidak ada ID, mengarahkan pengguna kembali ke halaman history
    header('Location: history.blade.php');
    exit();
}

// Mendapatkan ID transaksi dari parameter URL dan mengonversinya ke integer
$id = (int)$_GET['id'];

// Mempersiapkan query untuk memilih transaksi kereta berdasarkan ID
$query = "SELECT * FROM history_transaction_kereta WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id); // Mengikat parameter ID dengan tipe data integer
$stmt->execute(); // Menjalankan statement
$result = $stmt->get_result(); // Mendapatkan hasil dari statement
$transaction = $result->fetch_assoc(); // Mengambil hasil sebagai array asosiatif

// Memeriksa apakah form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $destination = $_POST['destination'];
    $customer_name = $_POST['customer_name'];
    $seats = (int)$_POST['seats'];
    $price = (int)$_POST['price'];
    $total_price = $price * $seats;

    // Mempersiapkan query untuk memperbarui transaksi kereta berdasarkan ID
    $updateQuery = "UPDATE history_transaction_kereta SET destination = ?, customer_name = ?, seats = ?, price = ?, total_price = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssiiii", $destination, $customer_name, $seats, $price, $total_price, $id); // Mengikat parameter dengan tipe data yang sesuai

    // Menjalankan statement dan memeriksa apakah berhasil
    if ($stmt->execute()) {
        // Jika berhasil, mengarahkan pengguna kembali ke halaman history
        header('Location: history.blade.php');
        exit();
    }

    $stmt->close(); // Menutup statement
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi Kereta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap CSS untuk gaya -->
    <link rel="stylesheet" href="css/style.css"> <!-- Menyertakan file CSS eksternal untuk gaya tambahan -->
</head>
<body>
    <section class="container my-5">
        <h2>Edit Transaksi</h2>
        <!-- Form untuk mengedit transaksi kereta -->
        <form method="POST">
            <div class="mb-3">
                <label for="destination" class="form-label">Tujuan Destinasi</label>
                <!-- Input untuk tujuan destinasi -->
                <input type="text" class="form-control" id="destination" name="destination" value="<?= htmlspecialchars($transaction['destination']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nama Customer</label>
                <!-- Input untuk nama customer -->
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= htmlspecialchars($transaction['customer_name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="seats" class="form-label">Jumlah Bangku</label>
                <!-- Input untuk jumlah bangku -->
                <input type="number" class="form-control" id="seats" name="seats" min="1" value="<?= $transaction['seats'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga per Bangku</label>
                <!-- Input untuk harga per bangku, hanya bisa dibaca -->
                <input type="text" class="form-control" id="price" name="price" value="<?= $transaction['price'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Harga</label>
                <!-- Input untuk total harga, hanya bisa dibaca -->
                <input type="text" class="form-control" id="total_price" name="total_price" value="<?= $transaction['total_price'] ?>" readonly>
            </div>
            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </section>

    <!-- Menyertakan Bootstrap JavaScript untuk interaktivitas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menambahkan event listener untuk input jumlah bangku
        document.getElementById('seats').addEventListener('input', function () {
            var seats = parseInt(this.value);
            var price = <?= $transaction['price'] ?>;
            // Menghitung total harga berdasarkan jumlah bangku dan harga per bangku
            document.getElementById('total_price').value = seats * price;
        });
    </script>

<?php include 'footer.php'; ?> <!-- Menyertakan file footer.php -->
</body>
</html>
