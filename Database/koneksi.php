<?php
$conn = mysqli_connect("localhost","root","","toko_online");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    if(mysqli_num_rows($result)==0){
        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
}

//Data User
function tambahUser($data){
    global $conn;
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);
    $nomor_hp = htmlspecialchars($data["nomor_hp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $query = "INSERT INTO pelanggan VALUES ('','$nama_pelanggan','$username','$password','$email','$nomor_hp','$alamat')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function editUser($data){
    global $conn;
    $id_pelanggan = $data["id_pelanggan"];
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);
    $nomor_hp = htmlspecialchars($data["nomor_hp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $query = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', username = '$username', password = '$password', email = '$email', nomor_hp = '$nomor_hp', alamat = '$alamat' WHERE id_pelanggan = $id_pelanggan";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapusUser($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pelanggan WHERE id_pelanggan = $id");
    return mysqli_affected_rows($conn);
}

// Data Kategori
function tambahKategori($data){
    global $conn;
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $query = "INSERT INTO kategori VALUES ('','$nama_kategori')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function editKategori($data){
    global $conn;
    $id_kategori = $data["id_kategori"];
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id_kategori";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapusKategori($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori = $id");
    return mysqli_affected_rows($conn);
}

//Data Produk
function tambahProduk($data){
    global $conn;
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
    $gambar_produk = upload();
    if(!$gambar_produk){
        return false;
    }
    $query = "INSERT INTO produk VALUES ('','$id_kategori','$nama_produk','$harga_produk','$deskripsi_produk','$gambar_produk')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function editProduk($data){
    global $conn;
    $id_produk = $data["id_produk"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);
    $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);

    //cek apakah user pilih gambar baru atau tidak
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if($_FILES["gambar_produk"]["error"]===4){
        $gambar_produk = $gambarLama;
    }else{
        $gambar_produk = upload();
    }
    //end komentar

    if(!$gambar_produk){
        return false;
    }
    $query = "UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga_produk = '$harga_produk', deskripsi_produk = '$deskripsi_produk', gambar_produk = '$gambar_produk' WHERE id_produk = $id_produk";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapusProduk($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM produk WHERE id_produk = $id");
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar_produk"]["name"];
    $ukuranFile = $_FILES["gambar_produk"]["size"];
    $error = $_FILES["gambar_produk"]["error"];
    $tmpName = $_FILES["gambar_produk"]["tmp_name"];

    if($error === 4){
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ["jpg","jpeg","png"];
    $ekstensiGambar = explode(".",$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }

    if($ukuranFile > 8000000){
        echo "
            <script>
                alert('Ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,"../img/produk/".$namaFileBaru);
    return $namaFileBaru;
}

?>