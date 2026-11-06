<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <h3>Travling!</h3>
                </div>
                <nav class="navbar-wrapper">
                    <ul class="nav-list">
                        <li><a href="home.blade.php">Home</a></li>
                        <li><a href="packages.blade.php">Packages</a></li>
                        <li class="dropdown">
                            <a href="our_tour.blade.php" class="dropbtn">Our Tour</a>
                            <div class="dropdown-content">
                             
                                <a href="pesawat.blade.php">Booking Tiket Pesawat</a>
                                <a href="hotel.blade.php">Booking Hotel</a>
                                <a href="kereta.blade.php">Booking Tiket Kereta</a>
                            </div>
                        </li>
                        <li><a href="about.blade.php">About Us + Contact</a></li>
                        <li><a href="gallery.blade.php">Gallery</a></li>
                        <li><a href="history.blade.php">History</a></li>
                    </ul>
                </nav>
                <!-- search -->
                <form action="" class="search-bar">
                    <input type="search" name="search" pattern=".*\S.*" required placeholder="Search...">
                    <button class="search-btn" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
                    <path d="M0 0h24v24H0V0z" fill="none"/>
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    </button>
                </form>
                <!-- Login -->
                <div class="home-container">
                    <div class="login-register">
                        <?php if (isset($_SESSION['username'])): ?>
                            <a href="logout.php"><button class="btn"><span>Log Out</span><i class="icon"></i></button></a>
                        <?php else: ?>
                            <a href="login.php"><button class="btn"><span>Login / Register</span><i class="icon"></i></button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
