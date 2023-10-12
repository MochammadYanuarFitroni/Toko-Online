<?php 
include 'header.php';
?>

<div class="container" style="padding-bottom: 250px;">
	<h2 style=" width: 100%; border-bottom: 4px solid #6ba4fa"><b>Register</b></h2>
	<form action="proses/register.php" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Nama</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="nama" required autocomplete="off">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Email</label>
					<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email" required autocomplete="off">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">username</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username" required autocomplete="off">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">No Tepl</label>
					<input type="number" class="form-control" id="exampleInputPassword1" placeholder="+62" name="telp" required autocomplete="off">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="off">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputPassword1">Konfirmasi Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password" name="konfirmasi" required autocomplete="off">
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
					<label for="exampleInputPassword1">Alamat</label>
                    <textarea cols="20" rows="5" type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Alamat Lengkap" required autocomplete="off"></textarea>
				</div>
            </div>
        </div>

		<button type="submit" class="btn btn-success">Register</button>
	</form>
</div>

<?php 
include 'footer.php';
?>