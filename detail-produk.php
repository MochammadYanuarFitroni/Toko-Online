<?php 
include 'header.php';
// $kode = mysqli_real_escape_string($conn,$_GET['produk']);
// $result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
// $row = mysqli_fetch_assoc($result);

$produkEdit=query("SELECT * FROM produk WHERE id_produk = $_GET[id]")[0];

?>
<div class="container">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Detail produk</b></h2>

	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
				<img src="img/produk/<?= $produkEdit['gambar_produk']; ?>" width="400">
			</div>
		</div>

		<div class="col-md-8">
			<form action="" method="POST">
				<input type="hidden" name="produk" value="<?= $produkEdit['id_produk'];  ?>">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td><b>Nama</b></td>
							<td><?= $produkEdit['nama_produk']; ?></td>
						</tr>
						<tr>
							<td><b>Harga</b></td>
							<td>Rp.<?= number_format($produkEdit['harga_produk']); ?></td>
						</tr>
						<tr>
							<td><b>Deskripsi</b></td>
							<td><?= $produkEdit['deskripsi_produk'];  ?></td>
						</tr>
					</tbody>
				</table>
				<?php 
				if(isset($_SESSION['id_pelanggan'])){
					?>
					<a href="proses/beli.php?id=<?php echo $produkEdit['id_produk']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang</a>
					<?php 
				}else{

					?>
					<a href="keranjang.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang</a>
					<?php 
				}
				?>
				<a href="index.php" class="btn btn-warning"> Kembali Belanja</a>
			</div>
		</form>
	</div>


</div>	
<br>
<br>

<?php 
include 'footer.php';
?>