<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('stisla/') ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('stisla/') ?>assets/css/components.css">
	<!-- Start GA -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4><?= lang('Auth.loginTitle') ?></h4>
							</div>

							<div class="card-body">
								<?= view('App\Views\Auth\_message_block') ?>

								<form action="<?= url_to('login') ?>" method="post" class="needs-validation">
									<?= csrf_field() ?>

									<?php if ($config->validFields === ['email']) : ?>
										<div class="form-group">
											<label for="login"><?= lang('Auth.email') ?></label>
											<input id="email" type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" placeholder="<?= lang('Auth.email') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>

									<?php else : ?>

										<div class="form-group">
											<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
											<input id="email" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" placeholder="<?= lang('Auth.emailOrUsername') ?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>

									<?php endif; ?>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label"><?= lang('Auth.password') ?></label>
											<?php if ($config->activeResetter) : ?>
												<div class="float-right">
													<a href="<?= base_url('forgot') ?>" class="text-small">
														<?= lang('Auth.forgotYourPassword') ?>
													</a>
												</div>
											<?php endif ?>
										</div>
										<input id="password" type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" tabindex="2" placeholder="<?= lang('Auth.password') ?>">
										<div class="invalid-feedback">
											<?= session('errors.password') ?>
										</div>
									</div>

									<?php if ($config->allowRemembering) : ?>
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if (old('remember')) : ?> checked <?php endif ?>>
												<label class="custom-control-label" for="remember-me"><?= lang('Auth.rememberMe') ?></label>
											</div>
										</div>
									<?php endif; ?>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											<?= lang('Auth.loginAction') ?>
										</button>
									</div>
								</form>
							</div>
						</div>
						<?php if ($config->allowRegistration) : ?>
							<div class="mt-5 text-muted text-center">
								Don't have an account? <a href="<?= base_url('register') ?>">Register</a>
							</div>
						<?php endif ?>
						<div class="simple-footer">
							Copyright &copy; Stisla 2018
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url('stisla/') ?>assets/modules/jquery.min.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/modules/popper.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/modules/tooltip.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/modules/moment.min.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="<?= base_url('stisla/') ?>assets/js/scripts.js"></script>
	<script src="<?= base_url('stisla/') ?>assets/js/custom.js"></script>
</body>

</html>