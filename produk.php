<?php 
	include 'header.php';
?>

<?php
include "proses/cari.php";

$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$jumlah_data_per_halaman = 6; // Jumlah data per halaman

$mulai = ($halaman - 1) * $jumlah_data_per_halaman;

if (isset($_POST['cari'])) {
    $kategori = isset($_POST['kategori']) ? (int)$_POST['kategori'] : null;
    $cari = $_POST['keyword'];
    $produk = cari($kategori, $cari);
    $total_data = count($produk);
    $total_halaman = ceil($total_data / $jumlah_data_per_halaman);
} else {
    $produk = query("SELECT * FROM produk LIMIT $mulai, $jumlah_data_per_halaman");

    $total = query("SELECT COUNT(*) as total FROM produk")[0];
    $total_data = $total['total'];
    $total_halaman = ceil($total_data / $jumlah_data_per_halaman);
}

?>

<!-- PRODUK TERBARU -->
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #6ba4fa"><b>Produk Kami</b></h2>

    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <form action="" method="POST">
                        <select class="form-control" name="kategori">
                            <option hidden value="">Semua Kategori</option>
                            <?php
                            $kategori = query("SELECT * FROM kategori"); // Ambil daftar kategori dari database
                            foreach ($kategori as $row) :
                            ?>
                                <option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari produk...">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block" name='cari'>Cari</button>
                </form>
            </div>
        </div>

    <div class="row">
        <?php
        foreach ($produk as $row) :
        ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="image-box">
                        <img src="img/produk/<?php echo $row['gambar_produk']; ?>" class="img-responsive">
                    </div>
                    <div class="caption">
                        <h4><?php echo $row['nama_produk']; ?></h4>
                        <h5>Rp. <?php echo number_format($row['harga_produk']); ?></h5>
                        <a href="proses/beli.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-primary">Beli</a>
                        <a href="detail-produk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>

    <div style="text-align: center;">
        <ul class="pagination">
            <?php if ($halaman > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halaman - 1; ?><?php if(isset($_POST['cari'])) echo '&cari='.$_POST['keyword']; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                <li class="page-item <?= ($i == $halaman) ? 'active' : ''; ?>">
                    <a class="page-link" href="?halaman=<?= $i; ?><?php if(isset($_POST['cari'])) echo '&cari='.$_POST['keyword']; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($halaman < $total_halaman) : ?>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halaman + 1; ?><?php if(isset($_POST['cari'])) echo '&cari='.$_POST['keyword']; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

 <?php 
	include 'footer.php';
 ?>