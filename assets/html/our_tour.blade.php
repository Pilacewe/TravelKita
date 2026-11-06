<?php
session_start();
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/our.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <h2>OUR TOUR</h2>
        </section>

        <section class="container my-5">
        <h2>Booking Hotel</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638378/10005852-74cec5c09a205d330e8ea53709797fc4_eo5bjb.jpg" class="card-img-top" alt="Standard Hotel">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Standard</h5>
                        <a href="hotel.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638397/67983033_XL_xahpqy.jpg" class="card-img-top" alt="Deluxe Hotel">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Deluxe</h5>
                        <a href="hotel.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638303/10009554-73787883305b0f020ddbe0777e787fb8_pxze34.jpg" class="card-img-top" alt="Luxury Hotel">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Luxury</h5>
                        <a href="hotel.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
        </div>

        <h2>Booking Tiket Pesawat</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718729483/1557909185986-6772dd5a2aa8f2554a146b478c5b50f1_vujjdm.webp" class="card-img-top" alt="Standard Flight">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Standard</h5>
                        <a href="pesawat.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718942767/pexels-marina-hinic-199169-730778_drwoy2.jpg" class="card-img-top" alt="Deluxe Flight">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Deluxe</h5>
                        <a href="pesawat.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718942767/aircraft-jet-landing-cloud-46148_qeo2cr.jpg" class="card-img-top" alt="Luxury Flight">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Luxury</h5>
                        <a href="pesawat.blade.php" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
        </div>

        <h2>Booking Tiket Kereta</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718976862/ilustrasi-kereta-api-indonesia-1_v3doe2.jpg" class="card-img-top" alt="Standard Train">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Standard</h5>
                        <a href="#" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718944275/E8Og4N8UcAApzxw_p3epq6.jpg  " class="card-img-top" alt="Deluxe Train">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Deluxe</h5>
                        <a href="#" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718976862/kereta-api-4-1024x678-w768_ctdnjc.webp" class="card-img-top" alt="Luxury Train">
                    <div class="card-body text-center">
                        <h5 class="card-title">Class: Luxury</h5>
                        <a href="#" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>