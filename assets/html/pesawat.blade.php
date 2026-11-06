<?php include 'navbar.php'; ?>

<?php
// Pastikan session_start hanya dipanggil sekali
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/pesawat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    
    <section class="hero">
        <div class="overlay"></div>
        <h2>BOOKING TIKET PESAWAT</h2>
    </section>
    
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pilih Merek Pesawat</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718731056/5fc0dc3a-a6c1-4e56-bcb8-6124f395f73f_169_drq9qf.jpg" class="card-img-top" alt="Garuda Indonesia">
                    <div class="card-body">
                        <h5 class="card-title">Garuda Indonesia</h5>
                        <a href="detail-pesawat.blade.php?airline=1" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718730921/ilustrasi-pesawat-lion-air-4_169_mc63nk.jpg" class="card-img-top" alt="Lion Air">
                    <div class="card-body">
                        <h5 class="card-title">Lion Air</h5>
                        <a href="detail-pesawat.blade.php?airline=2" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718730921/ykdj7wqsc4pndno4hsfz_evqrlf.jpg" class="card-img-top" alt="Citilink">
                    <div class="card-body">
                        <h5 class="card-title">Citilink</h5>
                        <a href="detail-pesawat.blade.php?airline=3" class="btn btn-primary">Pilih</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
