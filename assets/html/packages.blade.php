<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/packages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <h2>PACKAGES</h2>
        </section>

        <section class="intro">
            <h2>Bundling Travel Packages:</h2>
            <p>The Best Solution for a Worry-Free Vacation</p>
        </section>

        <section class="packages">
            <div class="package-container">
                <div class="package-box">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267444/DeWatermark.ai_1714967965628_jdbowm.png" alt="Labuan Bajo">
                    <p class="package-price">IDR. 5,100,000 Per person</p>
                    <button class="view-details-btn" data-destination="Labuan Bajo" data-price="5100000">View Details</button>
                </div>
                <div class="package-box">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267445/istockphoto-1097058034-1024x1024__1_-transformed_a7lfp9.jpg" alt="Candi Borobudur">
                    <p class="package-price">IDR. 3,958,000 Per person</p>
                    <button class="view-details-btn" data-destination="Candi Borobudur" data-price="3958000">View Details</button>
                </div>
                <div class="package-box">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267572/museum-angkut-pinterest_mwxsfa.png" alt="Museum Angkut">
                    <p class="package-price">IDR. 4,500,000 Per person</p>
                    <button class="view-details-btn" data-destination="Museum Angkut" data-price="4500000">View Details</button>
                </div>
            </div>
        </section>
    
    </main>

    <?php include 'footer.php'; ?>

    <!-- Script JavaScript -->
    <script>
        const viewButtons = document.querySelectorAll('.view-details-btn');

        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const destination = this.getAttribute('data-destination');
                const price = this.getAttribute('data-price');
                window.location.href = `form-packages.php?destination=${encodeURIComponent(destination)}&price=${encodeURIComponent(price)}`;
            });
        });
    </script>
</body>
</html>
