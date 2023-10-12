<?php
$pelangganEdit=query("SELECT * FROM pelanggan WHERE id_pelanggan = $_GET[id]")[0];

if(isset($_POST["submit"])){
    if(editUser($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href='index.php?halaman=user';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href='index.php?halaman=user';
            </script>
        ";
    }
}
?>

<h1>Edit Data User</h1>

<form action="" method="post">
    <div class="form-group">
        <input type="hidden" name="id_pelanggan" value="<?= $pelangganEdit["id_pelanggan"]?>">

        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"  
        value="<?= $pelangganEdit["nama_pelanggan"]?>" placeholder="Masukkan Nama Pelanggan" required autocomplete="off">

        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username"  
        value="<?= $pelangganEdit["username"]?>" placeholder="Masukkan Username" required autocomplete="off">

        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password"  
        value="<?= $pelangganEdit["password"]?>" placeholder="Masukkan Password" required autocomplete="off">

        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"  
        value="<?= $pelangganEdit["email"]?>" placeholder="Masukkan Email" required autocomplete="off">

        <label for="nomor_hp">Nomor Hp</label>
        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" 
        value="<?= $pelangganEdit["nomor_hp"]?>" placeholder="Masukkan Nomor Hp" required autocomplete="off">

        <label for="alamat">Alamat</label>
        <textarea cols="20" rows="5" type="text" class="form-control" id="alamat" 
        name="alamat" placeholder="Masukkan Alamat" required autocomplete="off"><?= $pelangganEdit["alamat"]?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Edit Data</button>
</form>