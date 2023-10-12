<?php
$produkEdit=query("SELECT * FROM produk WHERE id_produk = $_GET[id]")[0];

if(isset($_POST["submit"])){
    if(editProduk($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href='index.php?halaman=produk';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Diubah');
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
    .gambar{
        padding: 3px;
    }
</style>

<h1>Tambah Data Kategori</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="id_produk" value="<?= $produkEdit["id_produk"]?>">

        <label for="nama_produk">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" 
        value="<?= $produkEdit["nama_produk"]?>" name="nama_produk" placeholder="Masukkan Nama Produk" required autocomplete="off">

        <label for="kategori">Kategori</label>
        <?php $kategori = query("SELECT * FROM kategori"); ?>
        <?php $kategoriEdit = query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk = $_GET[id]")[0]; ?>
        <select class="form-control" id="id_kategori" name="id_kategori">
            <option value="<?= $kategoriEdit["id_kategori"] ?>" selected hidden><?= $kategoriEdit["nama_kategori"] ?></option>
            <?php foreach($kategori as $row) : ?>
                <option value="<?= $row["id_kategori"] ?>"><?= $row["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>

        <label for="deskripsi_produk">Deskripsi Produk</label>
        <textarea cols="20" rows="5" type="text" class="form-control" id="deskripsi_produk" 
        name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" required autocomplete="off"><?= $produkEdit['deskripsi_produk']?></textarea>

        <label for="harga_produk">Harga Produk</label>
        <input type="number" class="form-control" id="harga_produk" name="harga_produk" 
        value="<?= $produkEdit["harga_produk"]?>" placeholder="Masukkan Harga Produk" required autocomplete="off">

        <label for="gambar_produk">Gambar Produk</label><br>
        <img src="../img/produk/<?= $produkEdit["gambar_produk"]?>" width="100px" class="gambar"><br>
        <input type="hidden" name="gambarLama" value="<?= $produkEdit["gambar_produk"]?>">
        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Edit Data</button>
</form>