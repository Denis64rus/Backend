<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Панель управления - Напишите Пост</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">


    <link rel="stylesheet" href="../css/richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
</head>
<body>
<?php
	$key = "hhdsfs1263z";
	include "inc/side-nav.php";
	include_once("data/category.php");
	include_once("../db_conn.php");
	$categories = getAll($conn);
?>

	<div class="main-table">
		<h3 class="mb-3">Напишите Пост
			<a href="post.php" class="btn btn-secondary">Посты</a></h3>
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
	    	      action="req/post-create.php"
	    	      method="post"
	    	      enctype="multipart/form-data">

			  <div class="mb-3">
			    <label class="form-label">Заголовок</label>
			    <input type="text"
			           class="form-control"
			           name="title">
			  </div>

			  <div class="mb-3">
			    <label class="form-label">Обложка</label>
			    <input type="file"
			           class="form-control"
			           name="cover">
			  </div>

			  <div class="mb-3">
			    <label class="form-label">Текст</label>
			    <textarea
			        class="form-control text"
			        name="text">
			    </textarea>
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Категория</label>
			    <select name="category" class="form-control">
			    	<?php foreach ($categories as $category) { ?>
			    	<option value="<?=$category['id']?>"><?=$category['category']?></option>
			    	<?php }?>
			    </select>
			  </div>
			  <button type="submit" class="btn btn-primary">Создать</button>
			</form>
	</div>
	</section>
	</div>
	<div>
		<script>
			var navList = document.getElementById('navList').children;
			navList.item(1).classList.add("active");

	        $(document).ready(function() {
	            $('.text').richText();
	        });

		</script>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>