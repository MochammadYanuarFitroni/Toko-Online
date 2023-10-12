<?php 
include 'header.php';
?>
<!-- IMAGE -->
<div class="container-fluid" style="margin: 0;padding: 0;">
	<img src="image/home/33981.jpg" class="featured-image">
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">
	<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; 
	line-height: 29px; border-top: 2px solid #6ba4fa; border-bottom: 2px solid #6ba4fa;">
	Toko Alat Kesehatan ini merupakan salah satu toko alat kesehatan yang menyediakan berbagai macam alat kesehatan yang berkualitas dan terpercaya.</h4>	
	
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa; margin-top: 80px;"><b>Produk Kami</b></h2>
	<div class="row">
		<?php 
		$produk = query("SELECT * FROM produk ORDER BY RAND() LIMIT 3");

		foreach ($produk as $row) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="image-box">
						<img src="img/produk/<?php echo $row['gambar_produk']; ?>" class="img-responsive">
					</div>
					<div class="caption">
						<h4><?php echo $row['nama_produk']; ?></h4>
						<h5>Rp. <?php echo number_format($row['harga_produk']); ?></h5>
						<?php
						if(isset($_SESSION['id_pelanggan'])){
						?>
							<a href="proses/beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-primary">Beli</a>
						<?php
						}else{
						?>
							<a href="user-login.php" class="btn btn-primary">Beli</a>
						<?php
						}
						?>
						<a href="detail-produk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>