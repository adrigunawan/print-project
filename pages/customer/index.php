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
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="../admin/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php

        require "../../config/config.php";


        $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id_products DESC");
        if (mysqli_num_rows($products) > 0) {

            while ($row = mysqli_fetch_array($products)) {
                ?>
                <div class="card w-50">
                    <div class="card-body">
                        <image src="../../assets/img/<?php echo $row['gambar'] ?>" width='200px'>
                            <h5 class="card-title">
                                <?php echo $row['name'] ?>
                            </h5>
                            <p class="card-text">
                                Rp.
                                <?php echo number_format($row['price']) ?>
                            </p>
                            <a href="detail-product.php?id=<?php echo $row["id_products"] ?>" class="btn btn-primary">Button</a>
                    </div>
                </div>
                </tr>
            <?php }
        } else ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>