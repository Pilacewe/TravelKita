<?php
session_start();

$hotelName = filter_input(INPUT_GET, 'hotel-name', FILTER_SANITIZE_STRING);
$hotelPrice = filter_input(INPUT_GET, 'hotel-price', FILTER_VALIDATE_INT);
$hotelRegion = filter_input(INPUT_GET, 'hotel-region', FILTER_SANITIZE_STRING);

if (!$hotelName || !$hotelPrice || !$hotelRegion) {
    header("Location: error.php");
    exit();
}

$_SESSION['hotel_name'] = $hotelName;
$_SESSION['hotel_price'] = $hotelPrice;
$_SESSION['hotel_region'] = $hotelRegion;
?>

<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="../css/pemesanan.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <main>
        <section class="reservation">
            <h1>Reservation</h1>
            <form action="payment.php" method="post" onsubmit="return validateDates()">
                <div class="form-group">
                    <label for="hotel-name">Hotel Name</label>
                    <input type="text" id="hotel-name" name="hotel_name" value="<?php echo htmlspecialchars($hotelName); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="hotel_price">Price per Night</label>
                    <input type="text" id="hotel_price" name="hotel_price" value="<?php echo htmlspecialchars($hotelPrice); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Full Name</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="nohp">Phone Number</label>
                    <input type="text" id="nohp" name="nohp" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Address</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label for="checkin_date">Check-in Date</label>
                    <input type="date" id="checkin_date" name="checkin_date" required>
                </div>
                <div class="form-group">
                    <label for="checkout_date">Check-out Date</label>
                    <input type="date" id="checkout_date" name="checkout_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </section>
    </main>
    <script>
        function validateDates() {
            var checkinDate = document.getElementById('checkin_date').value;
            var checkoutDate = document.getElementById('checkout_date').value;

            if (new Date(checkoutDate) <= new Date(checkinDate)) {
                alert('Check-out date must be after the check-in date.');
                return false;
            }
            return true;
        }
    </script>
     <?php include 'footer.php'; ?>
</body>
</html>
