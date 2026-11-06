<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* Custom CSS untuk gallery */
        .gallery-section {
            margin-top: 50px;
            text-align: center;
        }
        .gallery-button {
            @apply inline-block px-6 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg transition duration-300 transform hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2;
        }
        .gallery-button.active {
            @apply bg-blue-800;
        }
        .gallery-item {
            @apply w-full md:w-1/3 p-4;
        }
        .gallery-item img {
            @apply w-full h-48 object-cover rounded-lg shadow-md;
        }
        .hidden {
            @apply hidden;
        }
    </style>
</head>
<body class="bg-gray-100">
<section class="hero">
            <div class="overlay"></div>
            <h2>GALLERY</h2>
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
<!-- about gallery -->
<div class="relative overflow-hidden bg-white">
  <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
    <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
      <div class="sm:max-w-lg">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Some photos of the destinations</h1>
        <p class="mt-4 text-xl text-gray-500">photo collection that we have, find interesting destinations on our website, travel anytime anywhere at low prices.</p>
      </div>
      <div>
        <div class="mt-10">
          <!-- Decorative image grid -->
          <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
            <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
              <div class="flex items-center space-x-6 lg:space-x-8">
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267444/DeWatermark.ai_1714967965628_jdbowm.png" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526882/dec6cbe7c762cb4d042685597a214951_rz10um.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1716793880/cld-sample-2.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267443/istockphoto-1216240951-1024x1024-transformed_xgas8n.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526881/a5d152b66a374046e01516e998f31d0d_xuaedu.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526288/6_ctjh70.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718267445/istockphoto-1097058034-1024x1024__1_-transformed_a7lfp9.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Galerry Provinsi -->
    <div class="container mx-auto px-4 py-8">
        <div class="gallery-section">
            <h1 class="text-3xl font-bold mb-4">Gallery Destinasi</h1>
            <p class="text-lg mb-8">Temukan destinasi terbaik di Jawa Barat, Jawa Tengah, dan Jawa Timur</p>
            <div class="mb-4">
                <button id="btn-jawa-barat" class="gallery-button active" onclick="showGallery('jawa-barat')">Jawa Barat</button>
                <button id="btn-jawa-tengah" class="gallery-button" onclick="showGallery('jawa-tengah')">Jawa Tengah</button>
                <button id="btn-jawa-timur" class="gallery-button" onclick="showGallery('jawa-timur')">Jawa Timur</button>
            </div>

            <div id="jawa-barat" class="gallery">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718526866/9249_ELSHINTADOTCOM_20211129_large-goodnewsfromindonesia-gnfi-gedungsate-bandung-e3c736d701c4128361bb0aadc973f68f_fuojck.jpg" alt="Jawa Barat 1">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 1</h3>
                        <p>Deskripsi singkat destinasi 1.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718527324/64c47d4f39778_hvpilr.png" alt="Jawa Barat 2">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 2</h3>
                        <p>Deskripsi singkat destinasi 2.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718527771/Puncak-Guha-Beach-Garut_ufsnbs.jpg" alt="Jawa Barat 3">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 3</h3>
                        <p>Deskripsi singkat destinasi 3.</p>
                    </div>
                </div>
            </div>

            <div id="jawa-tengah" class="gallery hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978157/Pantai-Parangtritis-1_vbdnov.jpg" alt="Jawa Tengah 1">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 1</h3>
                        <p>Deskripsi singkat destinasi 1.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978157/tempat-wisata-di-jawa-tengah_elbapk.webp" alt="Jawa Tengah 2">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 2</h3>
                        <p>Deskripsi singkat destinasi 2.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978148/bf1f2a39-bbad-4ff8-aaa4-36c57263105d_odmcgz.jpg" alt="Jawa Tengah 3">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 3</h3>
                        <p>Deskripsi singkat destinasi 3.</p>
                    </div>
                </div>
            </div>

            <div id="jawa-timur" class="gallery hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978143/wisata-pantai-klayar-2133516362_cko0z4.webp" alt="Jawa Timur 1">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 1</h3>
                        <p>Deskripsi singkat destinasi 1.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978143/desktop-wallpaper-surabaya-surabaya_taqlcc.jpg" alt="Jawa Timur 2">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 2</h3>
                        <p>Deskripsi singkat destinasi 2.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="https://res.cloudinary.com/djhlxfuzs/image/upload/v1718978320/gunung-bromo-ditutup-sementara-1_169_kh6l9r.jpg" alt="Jawa Timur 3">
                        <h3 class="mt-2 text-lg font-semibold">Destinasi 3</h3>
                        <p>Deskripsi singkat destinasi 3.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showGallery(region) {
            const galleries = document.querySelectorAll('.gallery');
            const buttons = document.querySelectorAll('.gallery-button');
            galleries.forEach(gallery => {
                gallery.classList.add('hidden');
            });
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            document.getElementById(region).classList.remove('hidden');
            document.getElementById('btn-' + region).classList.add('active');
        }

        // Menampilkan galeri Jawa Barat saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', () => {
            showGallery('jawa-barat');
        });
    </script>
     <?php include 'footer.php'; ?>
</body>
</html>
