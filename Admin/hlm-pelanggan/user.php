<style>
  a.btn.btn-primary.btn-lg {
    margin-bottom: 20px;
  }
</style>
<h1>Data Pelanggan</h1>
<a class="btn btn-primary btn-lg" href="index.php?halaman=tambahUser" role="button">Tambah Data</a>
<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Nomor Hp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1 ?>
    <?php foreach($pelanggan as $plng) : ?>
        <tr>
            <td scope="row"><?= $nomor ?></td>
            <td><?= $plng["nama_pelanggan"] ?></td>
            <td><?= $plng["username"] ?></td>
            <td><?= $plng["password"] ?></td>
            <td><?= $plng["email"] ?></td>
            <td><?= $plng["nomor_hp"] ?></td>
            <td><?= $plng["alamat"] ?></td>
            <td>
                <a href="index.php?halaman=editUser&id=<?= $plng["id_pelanggan"]?>" class="btn btn-warning">Edit</a>
                <a href="../Admin/hlm-pelanggan/hapusUser.php?id=<?= $plng["id_pelanggan"]?>" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
  </tbody>
</table>