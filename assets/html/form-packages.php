<?php include 'navbar.php'; ?>
<?php
include 'db_connect.php'; // Menyertakan file db_connect.php untuk menghubungkan ke database

$ID = "";
$name = "";
$alamat = "";
$nomor_handphone = "";
$price = "";
$destination = "";
$sukses = "";
$error = "";

// Mengambil destination dan price dari parameter URL
if (isset($_GET['destination']) && isset($_GET['price'])) {
    $destination = $_GET['destination'];
    $price = $_GET['price'];
}

// Jika form disubmit, proses penyimpanan data
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $price = $_POST['price'];
    $destination = $_POST['destination'];

    // Memastikan semua data telah diisi
    if ($name && $alamat && $nomor_handphone && $price && $destination) {
        // Menyusun query untuk menyimpan data transaksi
        $sql = "INSERT INTO transactions (name, alamat, nomor_handphone, price, destination) VALUES ('$name', '$alamat', '$nomor_handphone', '$price', '$destination')";
        $q1 = mysqli_query($conn, $sql);
        if ($q1) {
            $sukses = "Data berhasil disimpan";
        } else {
            $error = "Gagal menyimpan data";
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Form</title>
    <link rel="stylesheet" href="../css/form-packages.css"> <!-- Menyertakan file CSS eksternal untuk gaya tambahan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap CSS untuk gaya -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Menyertakan Font Awesome untuk ikon -->
</head>
<body>
<section class="hero">
    <div class="overlay"></div>
    <h2>PACKAGES</h2> <!-- Judul bagian -->
</section>

<div class="container">
    <h2>Transaction Form</h2> <!-- Judul form -->
    <?php if ($error) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
    <?php } ?>
    <?php if ($sukses) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php } ?>
    <form action="" method="POST"> <!-- Form untuk menyimpan data transaksi -->
        <div class="mb-3 row">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>"> <!-- Input untuk nama -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>"> <!-- Input untuk alamat -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nomor_handphone" class="col-sm-4 col-form-label">No. Handphone</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" value="<?php echo $nomor_handphone ?>"> <!-- Input untuk nomor handphone -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-4 col-form-label">Price</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" readonly> <!-- Input untuk harga (readonly) -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="destination" class="col-sm-4 col-form-label">Destination</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $destination ?>" readonly> <!-- Input untuk tujuan (readonly) -->
            </div>
        </div>
        <div class="col-12">
            <input type="submit" name="simpan" value="Submit" class="btn btn-primary"> <!-- Tombol untuk mengirim form -->
        </div>
    </form>
</div>

</body>
</html>
