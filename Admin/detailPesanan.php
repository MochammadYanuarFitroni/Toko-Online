<?php
$dataPembeli = query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian = $_GET[id]")[0];
$barangDibeli = query("SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk WHERE detail_pembelian.id_pembelian = $_GET[id]");
?>

<Style>
    .detailPesanan{
        font-size: 20px;
        border: 0;
    }
    .headTable{
        background-color: #8c8c8c;
        color: white;
    }
</Style>
<h1>Detail Pesanan atau Pembelian</h1>

<table class="detailPesanan">
    <tr>
        <td style="width: 200px;">
            <strong style="word-spacing: 101px;">Nama :</strong>
        </td>
        <td><?= $dataPembeli["nama_pelanggan"] ?></td>
    </tr>
    <tr>
        <td style="width: 200px;">
            <strong>Tanggal Pesanan :</strong>
        </td>
        <td><?= $dataPembeli["tanggal_pembelian"] ?></td>
    </tr>
    <tr>
        <td style="width: 200px;">
            <strong style="word-spacing: 91px;">Nomor :</strong>
        </td>
        <td><?= $dataPembeli["nomor_hp"] ?></td>
    </tr>
    <tr>
        <td style="width: 200px;">
            <strong style="word-spacing: 91px;">Alamat :</strong>
        </td>
        <td><?= $dataPembeli["alamat"] ?></td>
    </tr>
    <tr>
        <td style="width: 200px;">
            <strong style="word-spacing: 110px;">Total :</strong>
        </td>
        <td><?= $dataPembeli["total_pembelian"] ?></td>
    </tr>
</table>

<table class="table table-bordered">
  <thead class="headTable">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Sub Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1 ?>
    <?php foreach($barangDibeli as $barang) : ?>
        <tr>
            <th scope="row"><?= $nomor ?></th>
            <td><?= $barang["nama_produk"] ?></td>
            <td><?= $barang["harga_produk"] ?></td>
            <td><?= $barang["jumlah"] ?></td>
            <td><?= $barang["harga_produk"]*$barang["jumlah"] ?></td>
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
  </tbody>
</table>

