<?php include 'navbar.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$airline = isset($_GET['airline']) ? $_GET['airline'] : null;

$airline_names = [
    1 => "Garuda Indonesia",
    2 => "Lion Air",
    3 => "Citilink",
];

$destinations = [
    1 => [
        ["title" => "Jakarta ⇄ Batam", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718729721/1552466046441-fe05397a4bf05dd6eebdc961e2fd4178_vme4ua.webp", "price" => 2000000],
        ["title" => "Jakarta ⇄ Bali", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526882/dec6cbe7c762cb4d042685597a214951_rz10um.jpg", "price" => 2500000],
        ["title" => "Jakarta ⇄ Surabaya", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718730074/gambar-patung-sura-dan-baya-59_yrzrvj.jpg", "price" => 2200000],
    ],
    2 => [
        ["title" => "Jakarta ⇄ Yogyakarta", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734400/mobile_p8p7wq.jpg", "price" => 1800000],
        ["title" => "Jakarta ⇄ Medan", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734399/medan_d3smtc.jpg", "price" => 2100000],
        ["title" => "Jakarta ⇄ Makassar", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734397/fromandroid-556913cd6d71c3e5486cfeabfddc245b_oho4sx.jpg", "price" => 2300000],
    ],
    3 => [
        ["title" => "Nganjuk ⇄ Bandung", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526866/9249_ELSHINTADOTCOM_20211129_large-goodnewsfromindonesia-gnfi-gedungsate-bandung-e3c736d701c4128361bb0aadc973f68f_fuojck.jpg", "price" => 1700000],
        ["title" => "Bekasi ⇄ Lombok", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734735/Pantai-Kuta-Lombok-736851268_z6m8an.webp", "price" => 2500000],
        ["title" => "Palembang ⇄ Bogor", "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734741/indonesia-puncak-pass-bogor-bogor-landscape_e1qzx8.jpg", "price" => 1900000],
    ],
];

$current_destinations = isset($destinations[$airline]) ? $destinations[$airline] : [];
$airline_name = isset($airline_names[$airline]) ? $airline_names[$airline] : "Merek Pesawat";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airline = $_POST['airline'];
    $destination = $_POST['destination'];
    $customer_name = $_POST['customer_name'];
    $seats = (int)$_POST['seats'];
    $price = (int)$_POST['price'];
    $total_price = $price * $seats;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO history_transaction_pesawat (airline, destination, customer_name, seats, price, total_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiii", $airline, $destination, $customer_name, $seats, $price, $total_price);

    if ($stmt->execute()) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById("confirmationModal"), {});
                myModal.show();
            });
        </script>';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Pesawat</title>
    <link rel="stylesheet" href="../css/pesawat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .card-img-top {
            width: 100%;
            height: 400px; /* Set a fixed height */
            object-fit: cover; /* Ensure the image covers the area without distortion */
        }
        .card-body {
            flex: 1;
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <h2>BOOKING PESAWAT</h2>
        </section>
        <div class="container mt-5">
            <?php if ($airline === null || empty($current_destinations)): ?>
                <h1 class="text-center mb-4">Pilih Merek Pesawat</h1>
            <?php else: ?>
                <h1 class="text-center mb-4">Pilih Tujuan untuk <?= htmlspecialchars($airline_name) ?></h1>
                <div class="row">
                    <?php foreach ($current_destinations as $destination): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="<?= $destination['image'] ?>" class="card-img-top" alt="<?= $destination['title'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $destination['title'] ?></h5>
                                    <p class="card-text">Harga: Rp <?= number_format($destination['price'], 0, ',', '.') ?></p>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal" 
                                            data-airline="<?= htmlspecialchars($airline_name) ?>" 
                                            data-destination="<?= htmlspecialchars($destination['title']) ?>" 
                                            data-price="<?= $destination['price'] ?>">
                                        Pilih
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Form Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm" method="POST">
                        <div class="mb-3">
                            <label for="airline" class="form-label">Merek Pesawat</label>
                            <input type="text" class="form-control" id="airline" name="airline" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="destination" class="form-label">Tujuan Destinasi</label>
                            <input type="text" class="form-control" id="destination" name="destination" readonly>
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
                            <input type="text" class="form-control" id="price" name="price" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="confirmationModalLabel">Pembelian Berhasil!</h5>
                    <p>Tiket pesawat Anda telah berhasil dibeli.</p>
                    <a href="history.blade.php" class="btn btn-primary">Lihat Riwayat</a>
                    <a href="home.blade.php" class="btn btn-secondary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var airline = button.getAttribute('data-airline');
            var destination = button.getAttribute('data-destination');
            var price = button.getAttribute('data-price');

            var modalTitle = bookingModal.querySelector('.modal-title');
            var modalAirline = bookingModal.querySelector('#airline');
            var modalDestination = bookingModal.querySelector('#destination');
            var modalPrice = bookingModal.querySelector('#price');
            var modalTotalPrice = bookingModal.querySelector('#total_price');

            modalTitle.textContent = 'Form Pemesanan ' + airline;
            modalAirline.value = airline;
            modalDestination.value = destination;
            modalPrice.value = price;
            modalTotalPrice.value = price;

            var seatsInput = bookingModal.querySelector('#seats');
            seatsInput.addEventListener('input', function () {
                var seats = parseInt(this.value);
                modalTotalPrice.value = seats * price;
            });
        });
    </script>
</body>
</html>
