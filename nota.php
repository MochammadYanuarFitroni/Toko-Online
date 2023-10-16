<?php 
include 'header.php';
?>


<div class="container" style="padding-bottom: 200px">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Nota Pembelian</b></h2>
    <hr>
    <?php
    $query_pembayaran_terbaru = "SELECT * FROM pembelian 
    JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
    JOIN ongkir ON pembelian.id_ongkir=ongkir.id_ongkir 
    JOIN jenis_pembayaran ON pembelian.id_jenis_pembayaran=jenis_pembayaran.id_jenis_pembayaran
    WHERE pembelian.id_pelanggan = $_SESSION[id_pelanggan] ORDER BY id_pembelian DESC LIMIT 1";
    $result_pembayaran_terbaru = mysqli_query($conn, $query_pembayaran_terbaru);
    $detail_pembayaran_terbaru = mysqli_fetch_assoc($result_pembayaran_terbaru);
    ?>
    <!-- Informasi Pembeli -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h3><strong>Informasi Pembeli:</strong></h3>
            <p><strong>Nama:</strong> <?= $detail_pembayaran_terbaru["nama_pelanggan"] ?></p>
            <p><strong>Email:</strong> <?= $detail_pembayaran_terbaru["email"] ?></p>
            <p><strong>No. Telp:</strong> <?= $detail_pembayaran_terbaru["nomor_hp"] ?></p>
            <p><strong>Alamat:</strong> <?= $detail_pembayaran_terbaru["alamat"] ?></p>
            <p><strong>Ongkir:</strong> <?= $detail_pembayaran_terbaru["nama_ongkir"]?> - <?= $detail_pembayaran_terbaru["tarif_ongkir"]?></p>
            <p><strong>Jenis Pembayaran:</strong> <?= $detail_pembayaran_terbaru["nama_pembayaran"] ?></p>
        </div>
    </div>

    <!-- Detail Pembelian -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h3><strong>Detail Pembelian:</strong></h3>
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
                    <?php 
                    $nomor = 1;
                    $id = $detail_pembayaran_terbaru['id_pembelian'];
                    $detail = "SELECT * FROM detail_pembelian 
                    JOIN produk ON detail_pembelian.id_produk=produk.id_produk
                    JOIN pembelian ON detail_pembelian.id_pembelian = pembelian.id_pembelian
                    WHERE detail_pembelian.id_pembelian = $id";
                    $ambil = query($detail);
                    ?>
                    <?php 
                        foreach ($ambil as $row) : 
                            $subtotal = $row['harga_produk'] * $row['jumlah'];
                    ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><img src="img/produk/<?= $row['gambar_produk']; ?>" width="80px"></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td>Rp. <?= number_format($row['harga_produk']); ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>Rp. <?= number_format($subtotal); ?></td>
                        </tr>
                        <?php 
                        $nomor++;
                        ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <h4><strong>Total Pembelian Anda: </strong>Rp.<?= number_format($ambil[0]['total_pembelian'])?></h4>
        </div>
    </div>
    <div class="col-md-13" align="center">
        <h4><strong>!!Peringatan!!</strong></h4>
        <h5><strong>Dimohon untuk memfoto atau screenshot nota ini sebagai bukti</strong></h5>
        <h5><strong>dan jika perlu mengirimkannya ke nomor <a href="https://wa.me/6281280973367">WhatsApp</a> kami</strong></h5>
    </div>
    <div class="col-md-13">
        <a class="btn btn-primary btn-block" role="button" href="index.php">Home</a>
    </div>
</div>


<?php 
include 'footer.php';
?>