<?php
include '../Database/koneksi.php';
session_start();

$id_keranjang = $_GET['id'];

$id_pelanggan = $_SESSION['id_pelanggan']; // Ganti dengan ID pelanggan yang sesuai

// Periksa apakah produk ada dalam keranjang
$result_keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan' AND id_keranjang = '$id_keranjang'");

if(mysqli_num_rows($result_keranjang) > 0) {
    // Jika produk ditemukan dalam keranjang, lakukan DELETE
    $delete_query = "DELETE FROM keranjang WHERE id_pelanggan = '$id_pelanggan' AND id_keranjang = '$id_keranjang'";

    if(mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Produk telah dihapus dari keranjang belanja');</script>";
        echo "<script>location='../keranjang.php';</script>";
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Produk tidak ditemukan dalam keranjang');</script>";
    echo "<script>location='../keranjang.php';</script>";
}
?>