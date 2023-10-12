<h1>Data Pesanan atau Pembelian</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal Pembelian</th>
      <th scope="col">Total</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1 ?>
    <?php foreach($AllPembelian as $pembelian) : ?>
        <tr>
            <th scope="row"><?= $nomor ?></th>
            <td><?= $pembelian["nama_pelanggan"] ?></td>
            <td><?= $pembelian["tanggal_pembelian"] ?></td>
            <td><?= $pembelian["total_pembelian"] ?></td>
            <td>
                <a href="index.php?halaman=detailPesanan&id=<?= $pembelian["id_pembelian"]?>" class="btn btn-info">Detail</a>
            </td>
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
  </tbody>
</table>