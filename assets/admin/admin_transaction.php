<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini!'); window.location.href='login.php';</script>";
    exit();
}

include '../html/db_connect.php';

// Fetch data from database
$hotelTransactionsResult = $conn->query("SELECT * FROM history_transaction_hotel");
$pesawatTransactionsResult = $conn->query("SELECT * FROM history_transaction_pesawat");
$keretaTransactionsResult = $conn->query("SELECT * FROM history_transaction_kereta");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Transactions -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_transaction.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transactions</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Transactions</h1>

                    <!-- Transactions Tables -->
                    <div class="row">
                        <!-- Hotel Transactions -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Hotel Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTableHotel" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Hotel</th>
                                                    <th>Nama Customer</th>
                                                    <th>Nomor HP</th>
                                                    <th>Alamat</th>
                                                    <th>Check-in</th>
                                                    <th>Check-out</th>
                                                    <th>Total Price</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($transaction = $hotelTransactionsResult->fetch_assoc()): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($transaction['id']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['hotel_name']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['nama_lengkap']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['nohp']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['alamat']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['checkin_date']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['checkout_date']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['total_price']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['payment_method']) ?></td>
                                                        <td>
                                                            <a href="edit_transaction.php?id=<?= $transaction['id'] ?>&type=hotel" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="delete_transaction.php?id=<?= $transaction['id'] ?>&type=hotel" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pesawat Transactions -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pesawat Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTablePesawat" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Airline</th>
                                                    <th>Tujuan</th>
                                                    <th>Customer</th>
                                                    <th>Bangku</th>
                                                    <th>Harga /bangku</th>
                                                    <th>Total Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($transaction = $pesawatTransactionsResult->fetch_assoc()): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($transaction['id']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['airline']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['destination']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['customer_name']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['seats']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['price']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['total_price']) ?></td>
                                                        <td>
                                                            <a href="edit_transaction.php?id=<?= $transaction['id'] ?>&type=pesawat" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="delete_transaction.php?id=<?= $transaction['id'] ?>&type=pesawat" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kereta Transactions -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kereta Transactions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTableKereta" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tujuan</th>
                                                    <th>Customer</th>
                                                    <th>Bangku</th>
                                                    <th>Harga / bangku</th>
                                                    <th>Total Price</th>
                                                    <th>Tanggal Pembuatan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($transaction = $keretaTransactionsResult->fetch_assoc()): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($transaction['id']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['destination']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['customer_name']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['seats']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['price']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['total_price']) ?></td>
                                                        <td><?= htmlspecialchars($transaction['created_at']) ?></td>
                                                        <td>
                                                            <a href="edit_transaction.php?id=<?= $transaction['id'] ?>&type=kereta" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="delete_transaction.php?id=<?= $transaction['id'] ?>&type=kereta" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/js/sb-admin-2.min.js"></script>
</body>
</html>
