<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hotel.css">
    <link rel="stylesheet" href="../css/output.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hotel Booking</title>
</head>
<body>
<main>
    <section class="hero">
        <div class="overlay"></div>
        <h2>BOOKING HOTEL</h2>
    </section>

    <div class="container mx-auto px-4 py-8">
        <div class="gallery-section">
            <h1 class="text-3xl font-bold mb-4">Choose Your Hotel</h1>
            <div class="mb-4">
                <button id="btn-bandung" class="gallery-button active" onclick="showGallery('bandung')">Bandung</button>
                <button id="btn-jakarta" class="gallery-button" onclick="showGallery('jakarta')">Jakarta</button>
                <button id="btn-sukabumi" class="gallery-button" onclick="showGallery('sukabumi')">Sukabumi</button>
                <button id="btn-lampung" class="gallery-button" onclick="showGallery('lampung')">Lampung</button>
            </div>

            <div id="bandung" class="gallery">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="hotel" data-price="2000000" data-region="Bandung" data-name="Mercure Bandung City Centre">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638192/61948161_XL_gmimww.jpg" alt="Mercure Bandung City Centre" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Mercure Bandung City Centre</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,000,000</p>
                    </div>
                    <div class="hotel" data-price="2500000" data-region="Bandung" data-name="Hotel Aryaduta Bandung">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638303/10009554-73787883305b0f020ddbe0777e787fb8_pxze34.jpg" alt="Hotel Aryaduta Bandung" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Aryaduta Bandung </h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,500,000</p>
                    </div>
                    <div class="hotel" data-price="1800000" data-region="Bandung" data-name="The Papandayan Hotel">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638378/10005852-74cec5c09a205d330e8ea53709797fc4_eo5bjb.jpg" alt="The Papandayan Hotel" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">The Papandayan Hotel</h3>
                        <p>Class: Standard</p>
                        <p>Price: Rp. 1,800,000</p>
                    </div>
                    <div class="hotel" data-price="2200000" data-region="Bandung" data-name="Mercure Bandung Nexa Supratman">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638397/67983033_XL_xahpqy.jpg" alt="Mercure Bandung Nexa Supratman" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Mercure Bandung Nexa Supratman</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,200,000</p>
                    </div>
                    <div class="hotel" data-price="2700000" data-region="Bandung" data-name="De Paviljoen Bandung">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638472/10029331-b73cae1cf521ad33fb5b33ca7deb6889_jthtbp.jpg" alt="De Paviljoen Bandung" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">De Paviljoen Bandung</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 2,700,000</p>
                    </div>
                    <div class="hotel" data-price="2400000" data-region="Bandung" data-name="Art Deco Luxury Hotel & Residence">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718638471/10040418-405bd50d57c5944aca3521f15b929b41_h720cm.jpg" alt="Art Deco Luxury Hotel & Residence" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Art Deco Luxury Hotel & Residence</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,400,000</p>
                    </div>
                </div>
            </div>

            <div id="jakarta" class="gallery hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="hotel" data-price="3000000" data-region="Jakarta" data-name="Hotel Jakarta A">
                        <img src="https://example.com/hotel-jakarta-a.jpg" alt="Hotel Jakarta A" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta A</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 3,000,000</p>
                    </div>
                    <div class="hotel" data-price="3200000" data-region="Jakarta" data-name="Hotel Jakarta B">
                        <img src="https://example.com/hotel-jakarta-b.jpg" alt="Hotel Jakarta B" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta B</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 3,200,000</p>
                    </div>
                    <div class="hotel" data-price="3500000" data-region="Jakarta" data-name="Hotel Jakarta C">
                        <img src="https://example.com/hotel-jakarta-c.jpg" alt="Hotel Jakarta C" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta C</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 3,500,000</p>
                    </div>
                    <div class="hotel" data-price="2800000" data-region="Jakarta" data-name="Hotel Jakarta D">
                        <img src="https://example.com/hotel-jakarta-d.jpg" alt="Hotel Jakarta D" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta D</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,800,000</p>
                    </div>
                    <div class="hotel" data-price="3400000" data-region="Jakarta" data-name="Hotel Jakarta E">
                        <img src="https://example.com/hotel-jakarta-e.jpg" alt="Hotel Jakarta E" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta E</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 3,400,000</p>
                    </div>
                    <div class="hotel" data-price="2900000" data-region="Jakarta" data-name="Hotel Jakarta F">
                        <img src="https://example.com/hotel-jakarta-f.jpg" alt="Hotel Jakarta F" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Jakarta F</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 2,900,000</p>
                    </div>
                </div>
            </div>

            <div id="sukabumi" class="gallery hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="hotel" data-price="1500000" data-region="Sukabumi" data-name="Hotel Santika Sukabumi">
                        <img src="https://example.com/hotel-santika-sukabumi.jpg" alt="Hotel Santika Sukabumi" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Santika Sukabumi</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 1,500,000</p>
                    </div>
                    <div class="hotel" data-price="1400000" data-region="Sukabumi" data-name="Anugrah Hotel Sukabumi">
                        <img src="https://example.com/anugrah-hotel-sukabumi.jpg" alt="Anugrah Hotel Sukabumi" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Anugrah Hotel Sukabumi</h3>
                        <p>Class: Standard</p>
                        <p>Price: Rp. 1,400,000</p>
                    </div>
                    <div class="hotel" data-price="1600000" data-region="Sukabumi" data-name="Fresh Hotel Sukabumi">
                        <img src="https://example.com/fresh-hotel-sukabumi.jpg" alt="Fresh Hotel Sukabumi" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Fresh Hotel Sukabumi</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 1,600,000</p>
                    </div>
                </div>
            </div>

            <div id="lampung" class="gallery hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="hotel" data-price="1800000" data-region="Lampung" data-name="Hotel Novotel Lampung">
                        <img src="https://example.com/hotel-novotel-lampung.jpg" alt="Hotel Novotel Lampung" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Hotel Novotel Lampung</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 1,800,000</p>
                    </div>
                    <div class="hotel" data-price="1900000" data-region="Lampung" data-name="Swiss-Belhotel Lampung">
                        <img src="https://example.com/swiss-belhotel-lampung.jpg" alt="Swiss-Belhotel Lampung" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Swiss-Belhotel Lampung</h3>
                        <p>Class: Deluxe</p>
                        <p>Price: Rp. 1,900,000</p>
                    </div>
                    <div class="hotel" data-price="2000000" data-region="Lampung" data-name="Sheraton Lampung Hotel">
                        <img src="https://example.com/sheraton-lampung-hotel.jpg" alt="Sheraton Lampung Hotel" class="w-full h-48 object-cover">
                        <h3 class="mt-2 text-lg font-semibold">Sheraton Lampung Hotel</h3>
                        <p>Class: Luxury</p>
                        <p>Price: Rp. 2,000,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const hotels = document.querySelectorAll('.hotel');

    hotels.forEach(hotel => {
        hotel.addEventListener('click', () => {
            const hotelName = hotel.getAttribute('data-name');
            const hotelPrice = hotel.getAttribute('data-price');
            const hotelRegion = hotel.getAttribute('data-region');

            // Redirect to hotel detail page
            window.location.href = `detail-hotel.blade.php?hotel-name=${encodeURIComponent(hotelName)}&hotel-price=${hotelPrice}&hotel-region=${encodeURIComponent(hotelRegion)}`;
        });
    });

    function showGallery(region) {
        const galleries = document.querySelectorAll('.gallery');
        galleries.forEach(gallery => {
            gallery.classList.add('hidden');
        });
        document.getElementById(region).classList.remove('hidden');

        const buttons = document.querySelectorAll('.gallery-button');
        buttons.forEach(button => {
            button.classList.remove('active');
        });
        document.getElementById('btn-' + region).classList.add('active');
    }

    showGallery('bandung');

    const regionButtons = document.querySelectorAll('.gallery-button');
    regionButtons.forEach(button => {
        button.addEventListener('click', () => {
            const region = button.id.replace('btn-', '');
            showGallery(region);
        });
    });
});
</script>
<?php include 'footer.php'; ?>
</body>
</html>
