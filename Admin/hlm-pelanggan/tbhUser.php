<?php
if(isset($_POST["submit"])){
    if(tambahUser($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href='index.php?halaman=user';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href='index.php?halaman=user';
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

<h1>Tambah Data Pelanggan</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" required autocomplete="off">

        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required autocomplete="off">

        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required autocomplete="off">

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required autocomplete="off">

        <label for="nomor_hp">Nomor Hp</label>
        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor Hp" required autocomplete="off">

        <label for="alamat">Alamat</label>
        <textarea cols="20" rows="5" type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required autocomplete="off"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
</form>