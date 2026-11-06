<?php include 'navbar.php'; ?>

<?php
// Tujuan Destinasi
$destinations = [
    ["title" => "Jakarta ⇄ Bandung", "price" => 200000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526866/9249_ELSHINTADOTCOM_20211129_large-goodnewsfromindonesia-gnfi-gedungsate-bandung-e3c736d701c4128361bb0aadc973f68f_fuojck.jpg"],
    ["title" => "Jakarta ⇄ Surabaya", "price" => 300000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718729758/Anda-di-Surabaya-Inilah-Pentingnya-Menggunakan-Konsultan-Pajak-Surabaya_g9v1eq.jpg"],
    ["title" => "Jakarta ⇄ Yogyakarta", "price" => 250000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718734400/mobile_p8p7wq.jpg"],
    ["title" => "Jakarta ⇄ Semarang", "price" => 220000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718943895/7_ks8yle.webp"], // New Destination
    ["title" => "Jakarta ⇄ Malang", "price" => 270000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718943896/malang_xew61d.jpg"],  // New Destination
    ["title" => "Jakarta ⇄ Solo", "price" => 240000, "image" => "https://res.cloudinary.com/djhlxfuzs/image/upload/v1718943895/Keraton_Kasunanan_Surakarta_Solo_refvdr.jpg"],   // New Destination
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Tiket Kereta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/kereta.css">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Ensure the image covers the area without distortion */
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<main>
    <section class="hero">
        <div class="overlay"></div>
        <h2>BOOKING TIKET KERETA</h2>
    </section>
    <section class="container my-5">
        <h2>Booking Tiket Kereta</h2>
        <div class="row">
            <?php foreach ($destinations as $destination): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($destination['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($destination['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($destination['title']) ?></h5>
                            <p class="card-text">Harga: Rp <?= number_format($destination['price'], 0, ',', '.') ?></p>
                            <a href="booking.kereta.php?destination=<?= urlencode($destination['title']) ?>&price=<?= $destination['price'] ?>" class="btn btn-primary">
                                Pilih
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
