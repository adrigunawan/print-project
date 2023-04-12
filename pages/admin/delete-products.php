<?php

require "../../config/config.php";


if (isset($_GET['id'])) {

    $products = mysqli_query($conn, "SELECT gambar FROM products WHERE id_products = '" . $_GET['id'] . "'");

    $x = mysqli_fetch_object($products);

    unlink('../../assets/img/' . $x->gambar);

    $delete = mysqli_query($conn, "DELETE FROM products WHERE id_products = '" . $_GET['id'] . "'");

    echo "<script>
    
    alert('Data berhasil dihapus');

    window.location = 'index.php';
    
    </script>";
}
;


?>