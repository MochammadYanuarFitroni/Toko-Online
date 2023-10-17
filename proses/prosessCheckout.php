<?php
include '../Database/koneksi.php'; // Sertakan file koneksi ke database

session_start();

$id_pelanggan = $_SESSION['id_pelanggan'];
$tanggal_pembelian = date('Y-m-d'); // Anggap saja Anda ingin menyimpan tanggal saat ini
$total_pembelian = $_POST['total_belanjaan'];
$id_jenis_pembayaran = $_POST['pembayaran'];
$id_ongkir = $_POST['ongkir'];

// Masukkan ke dalam tabel pembelian
$query = "INSERT INTO pembelian VALUES ('', '$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$id_jenis_pembayaran', '$id_ongkir')";

if(mysqli_query($conn, $query)>0){
    // Dapatkan ID pembelian yang baru saja dimasukkan
    $id_pembelian = mysqli_insert_id($conn);
    
    // Ambil data dari keranjang untuk dimasukkan ke dalam tabel detail_pembelian
    $dataKeranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pelanggan = $_SESSION[id_pelanggan]");
    
    while ($row = mysqli_fetch_assoc($dataKeranjang)) {
        $id_produk = $row['id_produk'];
        $jumlah = $row['jumlah'];
    
        // Masukkan data ke dalam tabel detail_pembelian
        $query_detail = "INSERT INTO detail_pembelian (id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian', '$id_produk', '$jumlah')";
        mysqli_query($conn, $query_detail);
    }
    
    // Hapus item dari keranjang
    $query_remove_cart = "DELETE FROM keranjang WHERE id_pelanggan = '$id_pelanggan'";
    mysqli_query($conn, $query_remove_cart);
    
    // Alihkan pengguna ke halaman konfirmasi
    //header('Location: ../hlmnPembayaran.php');

    echo "<script>alert('Data barang sudah dikirimkan ke penjual.\\nSilahkan melakukan pembayaran sesuai yang anda pilih');</script>";
    echo "<script>location='../hlmnPembayaran.php';</script>";
    }
?>