<?php 
include 'header.php';
?>

<div class="container" style="padding-bottom: 200px">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Checkout</b></h2>
    <?php
    $dataPelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = $_SESSION[id_pelanggan]")[0];
    ?>
    <form action="proses/prosessCheckout.php" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" readonly value="<?= $dataPelanggan["nama_pelanggan"]?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" readonly value="<?= $dataPelanggan["email"]?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="telp">No Tepl</label>
					<input type="number" class="form-control" id="telp" name="telp" readonly value="<?= $dataPelanggan["nomor_hp"]?>">
				</div>
			</div>
		</div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
					<label for="alamat">Alamat</label>
                    <textarea cols="5" rows="5" type="text" class="form-control" id="alamat" name="alamat" readonly><?= $dataPelanggan["alamat"]?></textarea>
				</div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">SubTotal</th>
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
                                <td><img src="img/produk/<?= $row['gambar_produk']; ?>" width="80px"></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td>Rp. <?= number_format($row['harga_produk']); ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>Rp. <?= number_format($row['total_harga']); ?></td>
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

        <!-- pilihan ongkir dan pembayaran -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ongkir">Ongkir</label>
                    <select class="form-control" id="ongkir" name="ongkir" required onchange="updateTotal()">
                        <?php
                        $ongkir = query("SELECT * FROM ongkir");
                        ?>
                        <option value="" disabled selected hidden>Pilih Ongkir</option>
                        <?php foreach($ongkir as $row) : ?>
                            <option value="<?= $row['id_ongkir']; ?>" data-tarif="<?= $row['tarif_ongkir']; ?>">
                            <?= $row['nama_ongkir']; ?> - Rp. <?= number_format($row['tarif_ongkir']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="pembayaran">Pembayaran</label>
                    <select class="form-control" id="pembayaran" name="pembayaran" required onchange="updateTotal()">
                        <?php
                        $pembayaran = query("SELECT * FROM jenis_pembayaran");
                        ?>
                        <option value="" disabled selected hidden>Pilih Pembayaran</option>
                        <?php foreach($pembayaran as $row) : ?>
                            <option value="<?= $row['id_jenis_pembayaran']; ?>"><?= $row['nama_pembayaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <h2><strong id="totalBelanja" name="total_belanjaan">Total Belanjaan : Rp. <?php echo $totalBelanja?></strong></h2>
        <input type="hidden" name="total_belanjaan" id="total_belanjaan" value="<?= $totalBelanja ?>">
        <div class="col-md-12">
            <button class="btn btn-primary btn-block" type="submit">Button</button>
        </div>
    </form>

    <br>
	
</div>

<script>
function updateTotal() {
    // Ambil nilai ongkir dan pembayaran dari elemen select
    var ongkirElement = document.getElementById("ongkir");
    var ongkirIndex = ongkirElement.selectedIndex;
    var ongkirValue = ongkirElement.options[ongkirIndex].getAttribute("data-tarif");

    // Hitung total belanja
    var totalBelanja = <?= $totalBelanja ?>; // Ambil total belanja dari PHP

    // Tambahkan ongkir ke total belanja
    totalBelanja += parseInt(ongkirValue);

    // Perbarui tampilan total belanja
    document.getElementById("totalBelanja").textContent = "Total Belanjaan : Rp. " + totalBelanja.toLocaleString();
    document.getElementById("total_belanjaan").value = totalBelanja;
}
</script>


<?php 
include 'footer.php';
?>