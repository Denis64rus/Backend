<?php
session_start();

    // if admin logged in
	if (!isset($_SESSION['user_id']) &&
		!isset($_SESSION['user_email'])) {
?>

<!doctype html>
<html lang="ru">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Войти</title>

    	<!-- bootstrap 5 CSS CDN -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<body>

		<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
			<form class="p-5 rounded shadow"
				  style="max-width: 30rem; width: 100%;"
				  method="POST"
				  action="php/auth.php">

				<h1 class="text-center display-4 pb-5">Вход</h1>
				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
				 	 <?=htmlspecialchars($_GET['error']); ?>
				</div>
				<?php } ?>
				<div class="mb-3">
			    	<label for="exampleInputEmail1"
			    		   class="form-label">Эл. почта</label>
			    	<input type="email"
			    		   class="form-control"
			    		   name="email"
			    		   id="exampleInputEmail1"
			    		   aria-describedby="emailHelp">
			  	</div>

			  	<div class="mb-3">
			    	<label for="exampleInputPassword1"
			    		   class="form-label">Пароль</label>
			    	<input type="password"
			    		   class="form-control"
			    		   name="password"
			    		   id="exampleInputPassword1">
			  	</div>

			  	<button type="submit" class="btn btn-primary">Войти</button>
			  	<a href="index.php">Магазин</a>
			</form>
		</div>

    	<!-- bootstrap 5 JS bundle CDN -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</body>
</html>

<?php }else{
	header("Location: admin.php");
	exit;
 } ?>