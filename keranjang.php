<?php 
include 'header.php';
?>

<div class="container" style="padding-bottom: 300px;">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Keranjang</b></h2>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
			<tbody>
                <?php $nomor=1; ?>
                <?php
                $totalBelanja = 0;
                $dataKeranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pelanggan = $_SESSION[id_pelanggan]");
                $cek = mysqli_num_rows($dataKeranjang);
                if($cek == 0){
                    echo "
                    <tr>
                        <td colspan='7' style='text-align: center;'>Keranjang Kosong</td>
                    </tr>
                    ";
                }else{
                ?>
                <!-- ambil data dari database keranjang -->
                    <?php
                    $ambil = query("SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk WHERE id_pelanggan=$_SESSION[id_pelanggan]");
                    foreach ($ambil as $row) :
                    ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><img src="img/produk/<?= $row['gambar_produk']; ?>" width="100px"></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td>Rp. <?= number_format($row['harga_produk']); ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>Rp. <?= number_format($row['total_harga']); ?></td>
                            <td>
                                <a href="proses/hapusKeranjang.php?id=<?= $row['id_keranjang']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                        $nomor++; 
                        $subharga = $row['harga_produk'] * $row['jumlah'];
                        $totalBelanja += $subharga;
                        ?>
                    <?php endforeach?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="center"><b>Total Belanja</b></td>
                    <td  align="center"><b>Rp. <?= number_format($totalBelanja); ?></b></td>
                </tr>
            </tfoot>
		</table>
        <a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> 
        <a href="checkout.php?id=<?= $kode_cs; ?>" class="btn btn-primary">Checkout</a>
</div>
<?php 
include 'footer.php';
?>