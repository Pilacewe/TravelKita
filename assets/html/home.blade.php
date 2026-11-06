<?php
session_start();
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <h2>Home</h2>
        </section>

        <!-- About -->
        <section class="feature-v2 cd-position-relative cd-z-index-1 cd-margin-y-2xl">
            <div class="cd-container cd-max-width-adaptive-lg">
                <p class="feature-v2__label">Travling</p>
                <div class="feature-v2__grid">
                    <div class="feature-v2__grid-item-1">
                        <h1 class="text-capitalize">Find Your Perfect Destination The Ultimate Guide To Your Dream Destination</h1>
                    </div>
                    <div class="feature-v2__grid-item-2">
                        <div class="feature-v2__content">
                            <p>Kami adalah tim profesional yang berdedikasi untuk memberikan solusi perjalanan yang lengkap dan nyaman, memastikan setiap pelanggan mendapatkan pengalaman yang tak terlupakan. Dengan pengalaman bertahun-tahun, kami memahami kebutuhan dan harapan para pelancong modern.</p>
                            <p> Misi kami adalah memudahkan perjalanan Anda, dari mulai perencanaan hingga kembali dengan kenangan indah. Kami menawarkan berbagai layanan seperti booking hotel dengan ribuan pilihan di berbagai destinasi, booking kereta untuk perjalanan darat yang lancar, dan booking pesawat dengan berbagai maskapai terkemuka. Selain itu, kami juga menyediakan layanan tambahan seperti penyewaan mobil, paket wisata, dan transportasi lokal untuk memastikan setiap aspek perjalanan Anda tertangani dengan baik</p>
                            <p><a class="cd-btn cd-btn--primary" href="about.blade.php">Read more →</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Service -->
        <section class="our-service">
            <div class="container">
                <h2>Our Service</h2>
                <div class="services">
                    <div class="service">
                        <img src="../img/online-conference.png" alt="Content Edukaif">
                        <p>Gallery Edukatif</p>
                    </div>
                    <div class="service">
                        <img src="../img/travel-agency.png" alt="Recommended Destination">
                        <p>Recommended Destination</p>
                    </div>
                    <div class="service">
                        <img src="../img/writer.png" alt="arrival booking">
                        <p>arrival booking</p>
                    </div>
                </div>
            </div>
            <img class="plane" src="../img/plane.png" alt="Plane">
        </section>

        <div class="container">
            <div class="section">
                <div class="box box-large">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267444/DeWatermark.ai_1714967965628_jdbowm.png" alt="Destination 1">
                    <h3>Packages</h3>
                    <p>Temukan berbagai kegiatan dan acara menarik yang dapat memperkaya pengalaman Anda saat mengunjungi destinasi bersejarah kami. Dari tar berpendam yang mendalam hingga festival budaya...</p>
                    <a href="packages.blade.php">Baca Selengkapnya</a>
                </div>
                <div class="box center-box">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267445/istockphoto-1097058034-1024x1024__1_-transformed_a7lfp9.jpg" alt="Destination 2">
                    <h3>Our Tour</h3>
                    <p>Halaman Destination ini awal yg sempurna untuk menjelajahi keindahan dan kemakmuran dari destinasi bersejarah yang menakjubkan. Di sini, Anda akan menemukan informasi lengkap tentang tempat-tempat bersejarah...</p>
                    <a href="our_tour.blade.php">Baca Selengkapnya</a>
                </div>
                <div class="box box-large">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267443/istockphoto-1216240951-1024x1024-transformed_xgas8n.jpg" alt="Destination 3">
                    <h3>Gallery Photo</h3>
                    <p>Halaman Galeri Foto adalah tempat di mana Anda dapat menemukan koleksi gambar-gambar yang menakjubkan dari destinasi bersejarah yang kami tawarkan. Nikmati pemandangan yang memukau...</p>
                    <a href="gallery.blade.php">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </main>
</body>
</html>
