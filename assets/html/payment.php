<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nama_lengkap'] = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
    $_SESSION['nohp'] = filter_input(INPUT_POST, 'nohp', FILTER_SANITIZE_STRING);
    $_SESSION['alamat'] = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $_SESSION['checkin_date'] = filter_input(INPUT_POST, 'checkin_date', FILTER_SANITIZE_STRING);
    $_SESSION['checkout_date'] = filter_input(INPUT_POST, 'checkout_date', FILTER_SANITIZE_STRING);

    header("Location: payment.php");
    exit();
}

// Ambil data dari session
$hotelName = $_SESSION['hotel_name'];
$hotelPrice = $_SESSION['hotel_price'];
$checkinDate = $_SESSION['checkin_date'];
$checkoutDate = $_SESSION['checkout_date'];

// Hitung total malam dan harga total
$checkin = new DateTime($checkinDate);
$checkout = new DateTime($checkoutDate);
$interval = $checkin->diff($checkout);
$totalNights = $interval->days;
$totalPrice = $hotelPrice * $totalNights;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <main>
        <section class="payment">
            <h1>Payment</h1>
            <div class="payment-details">
                <p><strong>Service:</strong> <?php echo htmlspecialchars($hotelName); ?></p>
                <p><strong>Price per Night:</strong> Rp. <?php echo number_format($hotelPrice, 0, ',', '.'); ?></p>
                <p><strong>Total Nights:</strong> <?php echo htmlspecialchars($totalNights); ?></p>
                <p><strong>Total Price:</strong> Rp. <?php echo number_format($totalPrice, 0, ',', '.'); ?></p>
            </div>
            <form action="transaksi.php" method="post">
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <div class="custom-select-wrapper">
                        <select id="payment-method" name="payment_method" required>
                            <option value="credit-card">Credit Card</option>
                            <option value="bank-transfer">Bank Transfer</option>
                            <option value="paypal">PayPal</option>
                        </select>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Complete Payment</button>
            </form>
        </section>
       
    </main>
</body>
</html>
