<?php include 'navbar.php'; ?>
<?php include 'db_connect.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['destination']) || !isset($_GET['price'])) {
    header('Location: kereta.blade.php');
    exit();
}

$destination = urldecode($_GET['destination']);
$price = (int)$_GET['price'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destination = $_POST['destination'];
    $customer_name = $_POST['customer_name'];
    $seats = (int)$_POST['seats'];
    $total_price = $price * $seats;

    // Insert booking into database
    $stmt = $conn->prepare("INSERT INTO history_transaction_kereta (destination, customer_name, seats, price, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $destination, $customer_name, $seats, $price, $total_price);

    if ($stmt->execute()) {
        echo '<script>
            var myModal = new bootstrap.Modal(document.getElementById("confirmationModal"), {});
            myModal.show();
        </script>';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Tiket Kereta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="container my-5">
        <h2>Form Pemesanan</h2>
        <form id="bookingForm" method="POST">
            <div class="mb-3">
                <label for="destination" class="form-label">Tujuan Destinasi</label>
                <input type="text" class="form-control" id="destination" name="destination" value="<?= htmlspecialchars($destination) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="seats" class="form-label">Jumlah Bangku</label>
                <input type="number" class="form-control" id="seats" name="seats" min="1" value="1" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga per Bangku</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $price ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_price" name="total_price" value="<?= $price ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Beli</button>
        </form>
    </section>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="confirmationModalLabel">Pembelian Berhasil!</h5>
                    <p>Tiket kereta Anda telah berhasil dibeli.</p>
                    <a href="history.blade.php" class="btn btn-primary">Lihat Riwayat</a>
                    <a href="home.blade.php" class="btn btn-secondary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('seats').addEventListener('input', function () {
            var seats = parseInt(this.value);
            var price = <?= $price ?>;
            document.getElementById('total_price').value = seats * price;
        });
    </script>
</body>
</html>
