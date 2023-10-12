<?php
if(isset($_POST["submit"])){
    if(tambahKategori($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href='index.php?halaman=kategori';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href='index.php?halaman=kategori';
            </script>
        ";
    }
}
?>

<h1>Tambah Data Kategori</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" required autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
</form>