<?php include 'navbar.php'; ?>
<?php include 'db_connect.php'; ?>

<?php
// Mendefinisikan query SQL untuk mengambil semua data dari tabel history_transaction_hotel
$sql_hotel = "SELECT * FROM history_transaction_hotel";
// Menjalankan query dan menyimpan hasilnya dalam $result_hotel
$result_hotel = $conn->query($sql_hotel);

// Mendefinisikan query SQL untuk mengambil semua data dari tabel history_transaction_pesawat
$sql_pesawat = "SELECT * FROM history_transaction_pesawat";
// Menjalankan query dan menyimpan hasilnya dalam $result_pesawat
$result_pesawat = $conn->query($sql_pesawat);

// Mendefinisikan query SQL untuk mengambil semua data dari tabel history_transaction_kereta
$sql_kereta = "SELECT * FROM history_transaction_kereta";
// Menjalankan query dan menyimpan hasilnya dalam $result_kereta
$result_kereta = $conn->query($sql_kereta);

// Mendefinisikan query SQL untuk mengambil semua data dari tabel transactions dan mengurutkannya berdasarkan created_at secara descending
$sql = "SELECT * FROM transactions ORDER BY created_at DESC";
// Menjalankan query dan menyimpan hasilnya dalam $result
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History Transactions</title>
    <link rel="stylesheet" href="../css/pesawat.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(url) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <h2>History Transactions</h2>
        </section>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Riwayat Transaksi</h1>
            <br>
            <br>
            
            <!-- History Transaction Hotel -->
            <h2 class="text-center mb-4">History Transaksi Hotel</h2>
            <div class="table-responsive">
                <table class="table table-primary ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Hotel</th>
                            <th>Nama Customer</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Total Harga</th>
                            <th>Metode Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result_hotel->num_rows > 0): ?>
                            <?php while($row = $result_hotel->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['hotel_name']) ?></td>
                                    <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                    <td><?= htmlspecialchars($row['nohp']) ?></td>
                                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                                    <td><?= htmlspecialchars($row['checkin_date']) ?></td>
                                    <td><?= htmlspecialchars($row['checkout_date']) ?></td>
                                    <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                    <td><?= htmlspecialchars($row['payment_method']) ?></td>
                                    <td>
                                        <a href="edit-hotel.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('delete-hotel.php?id=<?= $row['id'] ?>')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">No data available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>

            <!-- History Transaction Pesawat -->
            <h2 class="text-center mb-4">History Transaksi Pesawat</h2>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Merek Pesawat</th>
                            <th>Tujuan Destinasi</th>
                            <th>Nama Customer</th>
                            <th>Jumlah Bangku</th>
                            <th>Harga per Bangku</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result_pesawat->num_rows > 0): ?>
                            <?php while($row = $result_pesawat->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['airline']) ?></td>
                                    <td><?= htmlspecialchars($row['destination']) ?></td>
                                    <td><?= htmlspecialchars($row['customer_name']) ?></td>
                                    <td><?= $row['seats'] ?></td>
                                    <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="edit-pesawat.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('delete-pesawat.php?id=<?= $row['id'] ?>')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada transaksi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>


            <!-- History Transaction Kereta -->
            <h2 class="text-center mb-4">History Transaksi Kereta</h2>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>Tujuan</th>
                            <th>Jumlah Tiket</th>
                            <th>Harga per Tiket</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result_kereta->num_rows > 0): ?>
                            <?php while($row = $result_kereta->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['customer_name']) ?></td>
                                    <td><?= htmlspecialchars($row['destination']) ?></td>
                                    <td><?= htmlspecialchars($row['seats']) ?></td>
                                    <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="edit-kereta.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('delete-kereta.php?id=<?= $row['id'] ?>')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada transaksi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            

            <h2 class="text-center mb-4">History Transaksi Packages</h2>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
            <th>Price</th>
            <th>Destination</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['nomor_handphone']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['destination']; ?></td>
                    <td><?php echo isset($row['created_at']) ? $row['created_at'] : 'N/A'; ?></td>
                    <td><a href="edit-packages.php?ID=<?php echo $row['ID']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7" class="text-center">No data found</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
        </div>
        <?php include 'footer.php'; ?>
    </main>

</body>
</html>
