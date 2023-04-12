<?php
require "../../config/config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link href="../../css/page-user.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Printku - Beranda</title>
</head>

<body>
    <header>
        <h1><a href="#">Printku</a></h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="../admin/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <?php


    $product = mysqli_query($conn, "SELECT * FROM products WHERE id_products = '" . $_GET['id'] . "' ");
    $p = mysqli_fetch_object($product)
        ?>
    <div class="container mt-5 me-5 d-flex">
        <div class="card p-5">
            <image src="../../assets/img/<?php echo $p->gambar ?>" width='200px'>
        </div>
        <div class="card-body ms-5">
            <h5 class="card-title">
                <?php echo $p->name ?>
            </h5>
            <input type="number" name="count" stlye="input[type:number]: width: 50px" />
            <p class="card-text">
                Rp.
                <?php echo number_format($p->price) ?>
            </p>
            <a href="detail-transaksi.php" class="btn btn-primary">Button</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>