<?php 
include 'header.php';
?>


<div class="container" style="padding-bottom: 200px">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Pembayaran</b></h2>
    <?php
    // $dataPelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = $_SESSION[id_pelanggan]")[0];

    // $ambil = query("SELECT * FROM pembelian JOIN jenis_pembayaran ON 
    // pembelian.id_jenis_pembayaran=jenis_pembayaran.id_jenis_pembayaran WHERE pembelian.id_pelanggan=$_SESSION[id_pelanggan]")[0];

    $query_pembayaran_terbaru = "SELECT * FROM pembelian WHERE id_pelanggan = $_SESSION[id_pelanggan] ORDER BY id_pembelian DESC LIMIT 1";
    $result_pembayaran_terbaru = mysqli_query($conn, $query_pembayaran_terbaru);
    $detail_pembayaran_terbaru = mysqli_fetch_assoc($result_pembayaran_terbaru);
    ?>

    <?php if($detail_pembayaran_terbaru['id_jenis_pembayaran'] == 1){?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <img src="image/home/Logo-BCA-PNG.png" alt="" width="350px">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h3><Strong>Bayar melalui nomor rekenik berikut</Strong></h3>
                <h3>
                    <Strong>Toko Alat Kesehatan</Strong>
                    <br>
                    <Strong>8273785469</Strong>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <h4>
                    Langkah-langkah pembayaran:
                    <ol>
                        <li>Lakukan transfer dengan nomor rekenik diatas</li>
                        <li>Setelah transfer foto atau screenhot bukti transfer</li>
                        <li>Kirim bukti tersebut melalui nomor WhatsApp kami</li>
                        <li>atau dapat klik link berikut <a href="https://wa.me/6281280973367">WhatsApp kami</a></li>
                    </ol>
                </h4>
                <br>
                <h4>
                    Berikut langkah-langkah atau link untuk transfer:
                    <br>
                    <a href="https://www.bca.co.id/id/Individu/layanan/e-banking/ATM-BCA?funnel_source=searchresult">Melalui Mbanking BCA</a>
                    <br>
                    <a href="https://money.kompas.com/read/2023/03/29/235931826/cara-transfer-uang-lewat-atm-bca-dengan-mudah">Melalui ATM</a>
                </h4>
                <h3 align="Center">
                    <strong>Terima Kasih Telah Belanja di Toko Kami</strong>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <a class="btn btn-primary btn-block" role="button" href="nota.php">Nota</a>
        </div>
    </div>
    <?php }else if($detail_pembayaran_terbaru['id_jenis_pembayaran'] == 2){?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <img src="image/home/Logo-BNI.png" alt="" width="350px">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h3><Strong>Bayar melalui nomor rekenik berikut</Strong></h3>
                <h3>
                    <Strong>Toko Alat Kesehatan</Strong>
                    <br>
                    <Strong>1114133113</Strong>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <h4>
                    Langkah-langkah pembayaran:
                    <ol>
                        <li>Lakukan transfer dengan nomor rekenik diatas</li>
                        <li>Setelah transfer foto atau screenhot bukti transfer</li>
                        <li>Kirim bukti tersebut melalui nomor WhatsApp kami</li>
                        <li>atau dapat klik link berikut <a href="https://wa.me/6281280973367">WhatsApp kami</a></li>
                    </ol>
                </h4>
                <br>
                <h4>
                    Berikut langkah-langkah atau link untuk transfer:
                    <br>
                    <a href="https://kiaton.kontan.co.id/news/inilah-5-cara-transfer-ke-sesama-bni-melalui-atm-hingga-mobile-banking">Cara transfer BNI</a>
                </h4>
                <h3 align="Center">
                    <strong>Terima Kasih Telah Belanja di Toko Kami</strong>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <a class="btn btn-primary btn-block" role="button" href="nota.php">Nota</a>
        </div>
    </div>
    <?php }else{?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <img src="image/home/cod.jpg" alt="" width="350px">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h2><Strong>Cash On Delivery</Strong></h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <h4>
                    Langkah-langkah pembayaran:
                    <ol>
                        <li>Setelah melakukan checkout tolong hubungi kami melalui WhatsApp kami</li>
                        <li>atau dapat klik link berikut <a href="https://wa.me/6281280973367">WhatsApp kami</a></li>
                        <li>Kirim nama serta barang yang dibeli</li>
                        <li>Tunggu barang sampai rumah dan bayarkan kepada kurirnya</li>
                    </ol>
                </h4>
                <br>
                <h3 align="Center">
                    <strong>Terima Kasih Telah Belanja di Toko Kami</strong>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <a class="btn btn-primary btn-block" role="button" href="nota.php">Nota</a>
        </div>
    </div>
    <?php }?>
	
</div>


<?php 
include 'footer.php';
?>