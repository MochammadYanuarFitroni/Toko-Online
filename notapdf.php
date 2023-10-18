<?php 
session_start();
include 'Database/koneksi.php';
if(isset($_SESSION['id_pelanggan'])){

	$kode_cs = $_SESSION['id_pelanggan'];
}

//data pembelian oleh pembeli
$query_pembayaran_terbaru = "SELECT * FROM pembelian 
JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
JOIN ongkir ON pembelian.id_ongkir=ongkir.id_ongkir 
JOIN jenis_pembayaran ON pembelian.id_jenis_pembayaran=jenis_pembayaran.id_jenis_pembayaran
WHERE pembelian.id_pelanggan = $_SESSION[id_pelanggan] ORDER BY id_pembelian DESC LIMIT 1";
$result_pembayaran_terbaru = mysqli_query($conn, $query_pembayaran_terbaru);
$detail_pembayaran_terbaru = mysqli_fetch_assoc($result_pembayaran_terbaru);

$nomor = 1;
$id = $detail_pembayaran_terbaru['id_pembelian'];
$detail = "SELECT * FROM detail_pembelian 
JOIN produk ON detail_pembelian.id_produk=produk.id_produk
JOIN pembelian ON detail_pembelian.id_pembelian = pembelian.id_pembelian
WHERE detail_pembelian.id_pembelian = $id";
$ambil = query($detail);

//membuat invoice atau nota dalam bentuk pdf
require_once('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Alat Kesehatan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
';

$html .= '<body>
<div class="container">
    <div class="col-md-13" align="center">
        <h1><b>Toko Alat Kesehatan</b></h1>
        <h2><b>Nota Pembelian</b></h2>
    </div>
    <!-- Informasi Pembeli -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h3><strong>Informasi Pembeli:</strong></h3>
            <p><strong>Id Pembelajaan:</strong> '.$detail_pembayaran_terbaru["id_pembelian"].'</p>
            <p><strong>Nama:</strong> '.$detail_pembayaran_terbaru["nama_pelanggan"].'</p>
            <p><strong>Email:</strong> '.$detail_pembayaran_terbaru["email"].'</p>
            <p><strong>No. Telp:</strong> '.$detail_pembayaran_terbaru["nomor_hp"].'</p>
            <p><strong>Alamat:</strong> '.$detail_pembayaran_terbaru["alamat"].'</p>
            <p><strong>Ongkir:</strong> '.$detail_pembayaran_terbaru["nama_ongkir"].' - '.$detail_pembayaran_terbaru["tarif_ongkir"].'</p>
            <p><strong>Jenis Pembayaran:</strong> '.$detail_pembayaran_terbaru["nama_pembayaran"].'</p>
            <p><strong>Tanggal:</strong> '.$detail_pembayaran_terbaru["tanggal_pembelian"].'</p>
        </div>
    </div>';

$html .= '<!-- Detail Pembelian -->
<div class="row mt-4">
    <div class="col-md-12">
        <h3><strong>Detail Pembelian:</strong></h3>
        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">SubTotal</th>
                </tr>
            </thead>
            <tbody>';

foreach ($ambil as $row) {
    $subtotal = $row['harga_produk'] * $row['jumlah'];
    $html .= '<tr>
            <td>'.$nomor.'</td>
            <td>'.$row['nama_produk'].'</td>
            <td>Rp. '.number_format($row['harga_produk']).'</td>
            <td>'.$row['jumlah'].'</td>
            <td>Rp. '.number_format($subtotal).'</td>
        </tr>';
}

$html .= '
            </tbody>
        </table>
        <h4><strong>Total Pembelian Anda: </strong>Rp.'.number_format($ambil[0]['total_pembelian']).'</h4>
    </div>
</div>';

$html .= '<div class="col-md-13" align="right">
            <h3><b>Toko Alat Kesehatan</b></h3>
        </div>
        <div class="col-md-13" align="center">
            <h4><strong>!!Peringatan!!</strong></h4>
            <h5><strong>Dimohon untuk menyimpan nota ini sebagai bukti</strong></h5>
            <h5><strong>jika perlu anda bisa mengirimkannya ke nomor <a href="https://wa.me/6281280973367">WhatsApp</a> kami</strong></h5>
        </div>
        <div class="col-md-13" align="center">
            <h3><b>Terimakasih sudah belanja ditoko kami</b></h3>
        </div>
    </div>
</body>
</html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$pdf = $dompdf->output();
$nama_file = "Nota Pembelian.pdf";
file_put_contents($nama_file, $pdf);

//untuk mengirim email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//mengirimkan email ke penjual
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = "tokoalatkesehatan49@gmail.com";
$mail->Password = "htpc iilc evmn yqad";
$mail->From = 'tokoalatkesehatan49@gmail.com';
$mail->FromName = 'Toko Alat Kesehatan';
$mail->addReplyTo('tokoalatkesehatan49@gmail.com', 'Toko Alat Kesehatan');
$mail->addAddress($detail_pembayaran_terbaru["email"], $detail_pembayaran_terbaru["nama_pelanggan"]);

$mail->addAttachment($nama_file);
$mail->Subject = 'Invoice atau nota pembelian';
$mail->Body = 'Terimakasih sudah berbelanja di Toko Alat Kesehatan. Berikut invoice atau nota pembelian anda.';

echo "<script>alert('invoice atau nota sudah terkirim');</script>";
echo "<script>location='index.php';</script>";
?>