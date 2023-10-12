<style>
  a.btn.btn-primary.btn-lg {
    margin-bottom: 20px;
  }
</style>
<h1>Data Kategori</h1>
<a class="btn btn-primary btn-lg" href="index.php?halaman=tambahKategori" role="button">Tambah Kategori</a>
<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1 ?>
    <?php foreach($AllKategori as $kategori) : ?>
        <tr>
            <th scope="row"><?= $nomor ?></th>
            <td><?= $kategori["nama_kategori"] ?></td>
            <td>
                <a href="index.php?halaman=editKategori&id=<?= $kategori["id_kategori"]?>" class="btn btn-warning">Edit</a>
                <a href="../Admin/hlm-kategori/hapusKategori.php?id=<?= $kategori["id_kategori"]?>" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
  </tbody>
</table>