<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'customer';

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Anda berhasil register!'); window.location.href='login.php';</script>";
    } else {
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="left">
                <img src="../img/login1.png" alt="Doctor Image"> <!-- Ganti src dengan path gambar yang sesuai -->
            </div>
            <div class="right">
                <div class="logo">Travling!</div>
                <div class="content">
                    <h2>Register</h2>
                    <?php if (isset($error)): ?>
                        <p class="error"><?= $error ?></p>
                    <?php endif; ?>
                    <form method="post" action="">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Register</button>
                        <a href="login.php">Already have an account? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
