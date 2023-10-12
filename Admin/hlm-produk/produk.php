<style>
  a.btn.btn-primary.btn-lg {
    margin-bottom: 20px;
  }
</style>
<h1>Data Produk</h1>
<a class="btn btn-primary btn-lg" href="index.php?halaman=tambahProduk" role="button">Tambah Produk</a>
<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Kategori</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Harga</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1 ?>
    <?php foreach($AllProduk as $produk) : ?>
        <tr>
            <th scope="row"><?= $nomor ?></th>
            <td><?= $produk["nama_produk"] ?></td>
            <td><?= $produk["nama_kategori"] ?></td>
            <td><?= $produk["deskripsi_produk"] ?></td>
            <td><?= $produk["harga_produk"] ?></td>
            <td><img src="../img/produk/<?= $produk["gambar_produk"]?>" width="100px"></td>
            <td>
                <a href="index.php?halaman=editProduk&id=<?= $produk["id_produk"]?>" class="btn btn-warning">Edit</a>
                <a href="../Admin/hlm-produk/hapusProduk.php?id=<?= $produk["id_produk"]?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
  </tbody>
</table>