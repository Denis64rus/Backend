<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Панель управления - Категории</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
	$key = "hhdsfs1263z";
	include "inc/side-nav.php";

?>

	<div class="main-table">
		<h3 class="mb-3">Добавьте Категорию
			<a href="category.php" class="btn btn-success">Категории</a></h3>
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
	    	      action="req/category-create.php"
	    	      method="post">

			  <div class="mb-3">
			    <label class="form-label">Категория</label>
			    <input type="text"
			           class="form-control"
			           name="category">
			  </div>

			  <button type="submit" class="btn btn-primary">Создать</button>
			</form>

	</div>
	</section>
	</div>
	<div>
		<script>
			var navList = document.getElementById('navList').children;
			navList.item(2).classList.add("active");
		</script>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>