<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Панель управления - Пользователи</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
	$key = "hhdsfs1263z";
	include "inc/side-nav.php";
	include_once("data/admin.php");
	include_once("../db_conn.php");
	$admin = getByID($conn, $_SESSION['admin_id']);

?>

	<div class="main-table">
		<h3 class="mb-3">Ваш Профиль</h3>
		<?php if (isset($_GET['error'])) { ?>
		<div class="alert alert-warning">
			<?=htmlspecialchars($_GET['error'])?>
		</div>
		<?php } ?>

		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success">
			<?=htmlspecialchars($_GET['success'])?>
		</div>
		<?php } ?>

		<form class="shadow p-3"
	    	      action="req/admin-edit.php"
	    	      method="post">
	    	  <h3>Редактировать Профиль</h3>
			  <div class="mb-3">
			    <label class="form-label">Имя</label>
			    <input type="text"
			           class="form-control"
			           name="fname"
			           value="<?=$admin['first_name']?>">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Фамилия</label>
			    <input type="text"
			           class="form-control"
			           name="lname"
			           value="<?=$admin['last_name']?>">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Имя пользователя</label>
			    <input type="text"
			           class="form-control"
			           name="username"
			           value="<?=$admin['username']?>">
			  </div>



			  <button type="submit" class="btn btn-primary">Редактировать</button>
		</form>

		<form class="shadow p-3 mt-5"
	    	      action="req/admin-edit-pass.php"
	    	      method="post">
	    	  <h3 id="cpassword">Поменять Пароль</h3>
	    		<?php if (isset($_GET['perror'])) { ?>
					<div class="alert alert-warning">
						<?=htmlspecialchars($_GET['perror'])?>
					</div>
			 	<?php } ?>

		<?php if (isset($_GET['psuccess'])) { ?>
		<div class="alert alert-success">
			<?=htmlspecialchars($_GET['psuccess'])?>
		</div>
		<?php } ?>
			  <div class="mb-3">
			    <label class="form-label">Текущий Пароль</label>
			    <input type="password"
			           class="form-control"
			           name="cpass">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Новый Пароль</label>
			    <input type="password"
			           class="form-control"
			           name="new_pass">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Подтвердить Пароль</label>
			    <input type="password"
			           class="form-control"
			           name="cnew_pass">
			  </div>



			  <button type="submit" class="btn btn-primary">Поменять пароль</button>
		</form>



		</div>
	  </section>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>