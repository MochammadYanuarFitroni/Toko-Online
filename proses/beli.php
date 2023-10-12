<?php
include '../Database/koneksi.php';
session_start();
$id_produk = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$row = mysqli_fetch_assoc($result);

$nama = $row['nama_produk'];
$harga = $row['harga_produk'];
$id = $row['id_produk'];

// Ganti nilai id_pelanggan sesuai dengan kebutuhan, contoh di bawah menggunakan id_pelanggan 1
$id_pelanggan = $_SESSION['id_pelanggan'];
print_r($id_pelanggan);

// Menghitung total harga berdasarkan jumlah dan harga produk
$jumlah = 1; // Ganti dengan jumlah yang sesuai

$result_keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk'");
if(mysqli_num_rows($result_keranjang) > 0) {
    // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
    $row_keranjang = mysqli_fetch_assoc($result_keranjang);
    $jumlah += $row_keranjang['jumlah'];

    // Update jumlah dan total harga
    $total_harga = $harga * $jumlah;

    $update_query = "UPDATE keranjang SET jumlah = '$jumlah', total_harga = '$total_harga' 
                     WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk'";
    
    if(mysqli_query($conn, $update_query)) {
        echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
        echo "<script>location='../keranjang.php';</script>";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
} else {
    // Jika produk belum ada di keranjang, lakukan insert
    $total_harga = $harga * $jumlah;

    $insert_query = "INSERT INTO keranjang (id_pelanggan, id_produk, nama_produk, jumlah, total_harga) 
                     VALUES ('$id_pelanggan', '$id', '$nama', '$jumlah', '$total_harga')";

    if(mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
        echo "<script>location='../keranjang.php';</script>";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}
?>