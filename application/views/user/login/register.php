<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?= base_url() ?>img/logo_dpm.png" alt="bootstrap 4 login page">
					</div>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-data') ?>"></div>

					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Daftar Akun</h4>
							<form method="POST" class="my-login-validation" action="<?= base_url(); ?>login/signUp" novalidate="">
								<div class="form-group">
									<label for="name">Nama</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										Nama anda siapa?
									</div>
								</div>

								<div class="form-group">
									<label for="nim">NIM</label>
									<input required id="nim" type="number" class="form-control" name="nim1" max="9999999999">
									<div class="invalid-feedback">
										NIM anda salah!
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Email anda salah!
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password1" required data-eye>
									<div class="invalid-feedback">
										Password diperlukan!
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Data saya sudah sepenuhnya benar </label>
										<div class="invalid-feedback">
											Data anda harus benar
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="sign_up" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Sudah punya akun? <a href="<?= base_url(); ?>login/index">Masuk</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2020 &mdash; Zaim Parahita
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.14.0/dist/sweetalert2.all.min.js "></script>
	<script src="<?= base_url() ?>js/my-login.js"></script>
</body>

</html>