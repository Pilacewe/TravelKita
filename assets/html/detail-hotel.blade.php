<?php include 'navbar.php'; ?>

<?php
$hotelName = filter_input(INPUT_GET, 'hotel-name', FILTER_SANITIZE_STRING);
$hotelPrice = filter_input(INPUT_GET, 'hotel-price', FILTER_VALIDATE_INT);
$hotelRegion = filter_input(INPUT_GET, 'hotel-region', FILTER_SANITIZE_STRING);

if (!$hotelName || !$hotelPrice || !$hotelRegion) {
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($hotelName); ?></title>
    <link rel="stylesheet" href="../css/detail-hotel.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
    <section class="hero">
        <div class="overlay"></div>
        <h2><?php echo htmlspecialchars($hotelName); ?></h2>
    </section>

    <div class="container">
        <div class="description-section">
            <h2 class="description-title">DESKRIPSI HOTEL</h2>
            <p class="description-subtitle">Menikmati kenyamanan dan kemewahan di jantung kota.</p>
            <p class="lead">Description: A beautiful hotel located in the heart of <?php echo htmlspecialchars($hotelRegion); ?>, offering luxurious amenities and comfortable accommodations.</p>
        </div>
        
        <h1 class="display-4"><?php echo htmlspecialchars($hotelName); ?></h1>
        <p class="lead">Region: <?php echo htmlspecialchars($hotelRegion); ?></p>
        <p class="lead">Price: Rp. <?php echo number_format($hotelPrice, 0, ',', '.'); ?></p>
        <p class="lead">Class: Deluxe</p>
        <a href="pemesanan.php?hotel-name=<?php echo urlencode($hotelName); ?>&hotel-price=<?php echo urlencode($hotelPrice); ?>&hotel-region=<?php echo urlencode($hotelRegion); ?>" class="btn btn-primary">Book Now</a>
    </div>
   
</main>
<script src="../js/script.js"></script>
</body>
</html>
