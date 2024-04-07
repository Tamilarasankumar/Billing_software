<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($system as $k => $v) {
	$_SESSION['system'][$k] = $v;
}
// }
ob_end_flush();
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

		* {
			font-family: 'Poppins', sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			outline: none;
			border: none;
			text-decoration: none;
		}

		body {
			width: 100%;
			height: calc(100%);
			position: fixed;
			top: 0;
			left: 0;
			background-color: #252836;

		}

		#main {
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 20px;
			padding-bottom: 60px;
		}

		main#main {
			width: 100%;
			height: calc(100%);
			display: flex;
			background-color: #252836;
		}

		h4 {
			font-size: 30px;
			color: #FBDE44FF;
		}

		button.btn-sm {
			background: #FBDE44FF;
			color: black;

			padding: 10px 30px;
			text-transform: capitalize;
			font-size: 20px;
			cursor: pointer;
		}

		form .btn-sm:hover {
			background: #FBDE44FF;
			color: #fff;
		}

		.card {
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 5px 10px rgba(203, 219, 175, 0.1);
			background: #1F1D2B;
			text-align: center;
			width: 500px;
		}

		form input {
			width: 100%;
			padding: 10px 15px;
			font-size: 17px;
			margin: 8px 0;
			background: #EEEEEE;
			border-radius: 5px;
		}
	</style>
	<title><?php echo $_SESSION['system']['name'] ?></title>


	<?php include('./header.php'); ?>
	<?php
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");

	?>

</head>

<body>


	<main id="main">

		<div class="align-self-center w-100">
			<div id="login-center" class="surface row justify-content-center">
				<div class="card col-md-4" style="background-color: #1F1D2B;">
					<div class="card-body">
						<h4 class="text-center"><b><?php echo $_SESSION['system']['name'] ?></b></h4>
						<br>
						<form id="login-form">
							<div class="form-group">

								<input type="text" id="username" name="username" placeholder="enter your Username">
							</div>

							<div class="form-group">

								<input type="password" id="password" name="password" placeholder="enter your password">
							</div>

							<button class="btn-sm ">Login Now</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

</html>