<?php include 'navbar.php'; ?> <!-- Menyertakan file navbar.php untuk menampilkan navbar -->
<?php
include 'db_connect.php'; // Menyertakan file db_connect.php untuk menghubungkan ke database

// Inisialisasi variabel untuk menyimpan data dan pesan
$ID = "";
$name = "";
$alamat = "";
$nomor_handphone = "";
$price = "";
$destination = "";
$sukses = "";
$error = "";

// Memeriksa apakah ada parameter ID dalam URL
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    // Mempersiapkan query untuk mengambil data transaksi berdasarkan ID
    $sql = "SELECT * FROM transactions WHERE ID = '$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Mengambil data transaksi jika ditemukan
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $alamat = $row['alamat'];
        $nomor_handphone = $row['nomor_handphone'];
        $price = $row['price'];
        $destination = $row['destination'];
    } else {
        // Menyimpan pesan kesalahan jika data tidak ditemukan
        $error = "Data tidak ditemukan";
    }
}

// Memeriksa apakah form dikirim dengan metode POST
if (isset($_POST['update'])) {
    // Mengambil data dari form
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    // $price dan $destination tidak diupdate dari form, karena readonly

    // Memeriksa apakah semua data form sudah terisi
    if ($name && $alamat && $nomor_handphone) {
        // Mempersiapkan query untuk memperbarui data transaksi
        $sql = "UPDATE transactions SET name='$name', alamat='$alamat', nomor_handphone='$nomor_handphone' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            // Menyimpan pesan sukses jika pembaruan berhasil
            $sukses = "Data berhasil diperbarui";
        } else {
            // Menyimpan pesan kesalahan jika pembaruan gagal
            $error = "Gagal memperbarui data: " . $conn->error;
        }
    } else {
        // Menyimpan pesan kesalahan jika data form belum lengkap
        $error = "Silahkan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Edit Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap CSS untuk gaya -->
    <link rel="stylesheet" href="../css/edit_packages.css"> <!-- Menyertakan file CSS eksternal untuk gaya tambahan -->
</head>
<body>
<section class="hero">
            <div class="overlay"></div>
            <h2>PACKAGES UPDATE</h2>
</section>

<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Packages
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesalahan jika ada -->
            <?php if ($error) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php } ?>
            <!-- Menampilkan pesan sukses jika ada -->
            <?php if ($sukses) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php } ?>
            <!-- Form untuk mengedit data paket -->
            <form action="" method="POST">
                <!-- Input tersembunyi untuk ID transaksi -->
                <input type="hidden" name="ID" value="<?php echo $ID ?>">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <!-- Input untuk nama -->
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <!-- Input untuk alamat -->
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_handphone" class="col-sm-3 col-form-label">No. Handphone</label>
                    <div class="col-sm-9">
                        <!-- Input untuk nomor handphone -->
                        <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" value="<?php echo $nomor_handphone ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <!-- Input untuk harga, hanya bisa dibaca -->
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="destination" class="col-sm-3 col-form-label">Destination</label>
                    <div class="col-sm-9">
                        <!-- Input untuk destinasi, hanya bisa dibaca -->
                        <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $destination ?>" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Tombol untuk mengirim form -->
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?> <!-- Menyertakan file footer.php -->
</body>
</html>
