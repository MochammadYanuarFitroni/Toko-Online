<?php
if(isset($_POST["submit"])){
    //print_r($_FILES["gambar_produk"]);
    if(tambahProduk($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href='index.php?halaman=produk';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href='index.php?halaman=produk';
            </script>
        ";
    }
}
?>

<style>
    label{
        padding-top: 10px;
    }
</style>


<h1>Tambah Data Produk</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required autocomplete="off">

        <label for="kategori">Kategori</label>
        <?php $kategori = query("SELECT * FROM kategori"); ?>
        <select class="form-control" id="id_kategori" name="id_kategori" required>
            <option value="" disabled selected hidden>Pilih Kategori</option>
            <?php foreach($kategori as $row) : ?>
                <option value="<?= $row["id_kategori"] ?>"><?= $row["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="deskripsi_produk">Deskripsi Produk</label>
        <textarea cols="20" rows="5" type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" required autocomplete="off"></textarea>

        <label for="harga_produk">Harga Produk</label>
        <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Masukkan Harga Produk" required autocomplete="off">

        <label for="gambar_produk">Gambar Produk</label>
        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Tambah Produk</button>
</form>