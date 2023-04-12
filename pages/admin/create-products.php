<?php
require '../../config/config.php';
session_start();

// error_reporting(0);

if ($_SESSION['status-login'] != true) {
    echo "<script>
    alert(You must login);

    window.location.href = 'login.php';
    </script>";
}


if (isset($_POST["addnewbarang"])) {

    // print_r($_FILES['gambar']);

    // Menampung inputan file dari file

    $namabarang = $_POST['name'];
    $stockbarang = $_POST['stock'];
    $price = $_POST['price'];

    // Menampung data format file yang dizinkan
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $type_file = explode('.', $nama_file);
    $input_file = $type_file[1];

    $new_file = 'products' . time() . '.' . $input_file;

    // input yang dizinkan
    $type_approved = array('jpg', 'png', 'jpeg', 'gif');

    // validasi format data

    if (!in_array($input_file, $type_approved)) {

        echo '<script>
        
        alert("format tidak sesuai");
        
        </script>';

    } else {
        move_uploaded_file($tmp_file, '../../assets/img/' . $new_file);

        $insert = mysqli_query($conn, "INSERT INTO products VALUES(null, '" . $namabarang . "','" . $new_file . "','" . $stockbarang . "','" . $price . "')");

        if ($insert) {
            echo '<script>
            
            alert("product berhasil ditambahkan");
            window.location.href = "index.php";

            </script>';
        } else {
            echo 'Produk gagal ditambahkan', mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PrinKu - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/home.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">PrintKu - Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="update-products.php">Update dan Create Produk</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Autentikasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <p>
                        <?php echo $_SESSION['a_global']->username ?>
                    </p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <form method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <h4>Tambah product</h4>
                        <div class="mb-3">
                            <label for='products' class=" w-50">nama barang</label>
                            <input class="form-control w-50" type="text" name="name" require>
                        </div>
                        <div class="mb-3">
                            <label for='products' class=" w-50">Gambar barang</label>
                            <input class="form-control w-50" type="file" name="gambar" require>
                        </div>
                        <div class="mb-3">
                            <label for='products' class=" w-50">Stock barang</label>
                            <input class="form-control w-50" type="number" name="stock" require>
                        </div>
                        <div class="mb-3">
                            <label for='products' class=" w-50">Harga barang</label>
                            <input class="form-control w-50" type="number" name="price" require>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="addnewbarang">Add barang</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <td>Id</td>
                            <td>Nama Barang</td>
                            <td>Gambar</td>
                            <td>Stock</td>
                            <td>Price</td>
                            <td>Aksi</td>
                        </thead>
                    </tr>

                    <tbody>
                        <?php
                        $i = 1;
                        $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id_products DESC");
                        if (mysqli_num_rows($products) > 0) {
                            while ($row = mysqli_fetch_array($products)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++ ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name'] ?>
                                    </td>
                                    <td>
                                        <img src="../../assets/img/<?php echo $row['gambar'] ?>" width="50px">
                                    </td>
                                    <td>
                                        <?php echo $row['stock'] ?>
                                    </td>
                                    <td>
                                        Rp.
                                        <?php echo number_format($row['price']) ?>
                                    </td>
                                    <td>
                                        <a href="edit-products.php?id=<?php echo $row['id_products'] ?>">Edit</a>
                                        |
                                        <a href="delete-products.php?id=<?php echo $row['id_products'] ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                        } else ?>
                    </tbody>
                </table>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../../assets/demo/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../../assets/demo/datatables-simple-demo.js"></script>
</body>

</html>