<?php
// Memulai sesi untuk melacak pengguna yang login
session_start();

// Menghubungkan ke database
require 'db_connect.php';

// Mengecek apakah request yang diterima adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mempersiapkan query untuk mencari pengguna berdasarkan username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    // Menjalankan query ke database
    $result = mysqli_query($conn, $sql);

    // Mengecek apakah ada hasil yang ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Mengambil hasil query dalam bentuk array asosiatif
        $row = mysqli_fetch_assoc($result);
        // Mengecek apakah password yang dimasukkan sesuai dengan yang ada di database
        if (password_verify($password, $row['password'])) {
            // Menyimpan username dan role pengguna ke dalam sesi
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            // Mengecek apakah pengguna adalah admin
            if ($row['role'] == 'admin') {
                // Jika pengguna adalah admin, arahkan ke dashboard admin
                echo "<script>alert('Anda berhasil login sebagai admin!'); window.location.href='../admin/dashboard.php';</script>";
            } else {
                // Jika bukan admin, arahkan ke halaman home
                echo "<script>alert('Anda berhasil login!'); window.location.href='home.blade.php';</script>";
            }
        } else {
            // Jika password salah, set pesan error
            $error = "Password salah.";
        }
    } else {
        // Jika username tidak ditemukan, set pesan error
        $error = "Username tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Link ke file CSS eksternal untuk styling -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- Menggunakan Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
</head>
<body>
    <!-- Bagian utama halaman login -->
    <div class="main">
        <div class="container">
            <!-- Bagian kiri dengan gambar -->
            <div class="left">
                <img src="../img/login1.png" alt="Doctor Image"> <!-- Ganti src dengan path gambar yang sesuai -->
            </div>
            <!-- Bagian kanan dengan form login -->
            <div class="right">
                <div class="logo">Travling!</div> <!-- Logo aplikasi -->
                <div class="content">
                    <h2>Login</h2>
                    <!-- Menampilkan pesan error jika ada -->
                    <?php if (isset($error)): ?>
                        <p class="error"><?= $error ?></p>
                    <?php endif; ?>
                    <!-- Form login -->
                    <form method="post" action="">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
                        <a href="register.php">Don't have an account? Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
