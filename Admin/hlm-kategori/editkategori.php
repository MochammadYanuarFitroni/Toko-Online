<?php
$nama_kgt=query("SELECT * FROM kategori WHERE id_kategori = $_GET[id]")[0];

if(isset($_POST["submit"])){
    if(editKategori($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href='index.php?halaman=kategori';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href='index.php?halaman=kategori';
            </script>
        ";
    }
}
?>

<h1>Tambah Data Kategori</h1>

<form action="" method="post">
    <div class="form-group">
        <input type="hidden" name="id_kategori" value="<?= $nama_kgt["id_kategori"]?>">
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" 
        placeholder="Masukkan Nama Kategori" value="<?= $nama_kgt["nama_kategori"]?>" required autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Edit Kategori</button>
</form>