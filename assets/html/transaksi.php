<?php
session_start();

include 'navbar.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve session data
    $hotelName = $_SESSION['hotel_name'];
    $hotelPrice = $_SESSION['hotel_price'];
    $namaLengkap = $_SESSION['nama_lengkap'];
    $nohp = $_SESSION['nohp'];
    $alamat = $_SESSION['alamat'];
    $checkinDate = $_SESSION['checkin_date'];
    $checkoutDate = $_SESSION['checkout_date'];
    
    // Validate payment method
    $paymentMethod = filter_input(INPUT_POST, 'payment_method', FILTER_SANITIZE_STRING);
    if (!in_array($paymentMethod, ['credit-card', 'bank-transfer', 'paypal'])) {
        header("Location: payment.php");
        exit();
    }

    // Calculate total price
    $checkin = new DateTime($checkinDate);
    $checkout = new DateTime($checkoutDate);
    $interval = $checkin->diff($checkout);
    $totalNights = $interval->days;
    $totalPrice = $hotelPrice * $totalNights;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO history_transaction_hotel (hotel_name, nama_lengkap, nohp, alamat, checkin_date, checkout_date, total_price, payment_method, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssis", $hotelName, $namaLengkap, $nohp, $alamat, $checkinDate, $checkoutDate, $totalPrice, $paymentMethod);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: history.blade.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction</title>
    <link rel="stylesheet" href="../css/transaksi.css">
</head>
<body>
    <main>
        <section class="payment">
            <h1>Payment</h1>
            <div class="payment-details">
                <p>Service: <?php echo htmlspecialchars($_SESSION['hotel_name']); ?></p>
                <p>Price per Night: Rp. <?php echo number_format($_SESSION['hotel_price'], 0, ',', '.'); ?></p>
            </div>
            <form action="transaksi.php" method="post">
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method" name="payment_method" required>
                        <option value="credit-card">Credit Card</option>
                        <option value="bank-transfer">Bank Transfer</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Complete Payment</button>
            </form>
        </section>
        <?php include 'footer.php'; ?>
    </main>
</body>
</html>
