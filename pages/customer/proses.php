<?php
require "../config/config.php";

$id = $_GET['id_products'];

$sql = "SELECT * FROM products WHERE id_products = '" . $id . "'";
$query = mysqli_query($conn, $sql);
$hasil = mysqli_fetch_object($query);


$_SESSION[$id] = [
    "name" => $hasil->name,
    "harga" => $hasil->price,
];
?>