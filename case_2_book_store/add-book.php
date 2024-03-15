<?php
session_start();

    // if admin logged in
	if (isset($_SESSION['user_id']) &&
		isset($_SESSION['user_email'])) {

		// Database Connection file
		include "db_conn.php";

		// Category helper function
		include "php/func-category.php";
		$categories = get_all_categories($conn);

		// Author helper function
		include "php/func-author.php";
		$authors = get_all_authors($conn);

		if (isset($_GET['title'])) {
			$title = $_GET['title'];
		}else $title = '';

		if (isset($_GET['desc'])) {
			$desc = $_GET['desc'];
		}else $desc = '';

		if (isset($_GET['category_id'])) {
			$category_id = $_GET['category_id'];
		}else $category_id = 0;

		if (isset($_GET['author_id'])) {
			$author_id = $_GET['author_id'];
		}else $author_id = 0;
 ?>

<!doctype html>
<html lang="ru">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Добавить Книгу</title>

    	<!-- bootstrap 5 CSS CDN -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  	</head>
 	<body>
	    <div class="container">
	    	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			 	<div class="container-fluid">
			    	<a class="navbar-brand" href="admin.php">Администратор</a>
			    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      		<span class="navbar-toggler-icon"></span>
			    	</button>
			        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        		<li class="nav-item">
			          			<a class="nav-link" aria-current="page" href="index.php">Магазин</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link active" href="add-book.php">Добавить Книгу</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link" href="add-category.php">Добавить Категорию</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link" href="add-author.php">Добавить Автора</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link" href="logout.php">Выйти</a>
			        		</li>
			        	</ul>
			    	</div>
			  	</div>
			</nav>
		<form action="php/add-book.php"
			  method="post"
			  enctype="multipart/form-data"
			  class="shadow p-4 rounded mt-5"
			  style="width: 90%; max-width: 50rem;">

			<h1 class="text-center pb-5 display-4 fs-3">
				Добавить Новую Книгу
			</h1>
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
				 	 <?=htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<div class="alert alert-success" role="alert">
				 	 <?=htmlspecialchars($_GET['success']); ?>
				</div>
			<?php } ?>
			<div class="mb-3">
			    <label class="form-label">Название Книги</label>
			    <input type="text"
			    	   class="form-control"
			    	   value="<?=$title?>"
			    	   name="book_title">
			</div>

			<div class="mb-3">
			    <label class="form-label">Описание Книги</label>
			    <input type="text"
			    	   class="form-control"
			    	   value="<?=$desc?>"
			    	   name="book_description">
			</div>

			<div class="mb-3">
			    <label class="form-label">Автор Книги</label>
			    <select name="book_author"
			    		class="form-control">
			    	<option value="0">Выбрать автора</option>
			    	<?php
			    		if ($authors == 0) {

			    		}else {
			    		foreach ($authors as $author) {
			    			if ($author_id == $author['id']) {
			    		?>
			    		<option selected value="<?=$author['id']?>"><?=$author['name']?></option>
			    		<?php }else{ ?>
			    		<option value="<?=$author['id']?>"><?=$author['name']?></option>
			    	<?php }} } ?>
			    </select>
			</div>

			<div class="mb-3">
			    <label class="form-label">Категория Книги</label>
			    <select name="book_category"
			    		class="form-control">
			    	<option value="0">Выбрать категорию</option>
			    	<?php
			    		if ($categories == 0) {

			    		}else {
			    		foreach ($categories as $category) {
			    			if ($category_id == $category['id']) {
			    		?>
			    		<option selected value="<?=$category['id']?>"><?=$category['name']?></option>
			    		<?php }else{ ?>
			    		<option value="<?=$category['id']?>"><?=$category['name']?></option>
			    	<?php }} } ?>
			    </select>
			</div>

			<div class="mb-3">
			    <label class="form-label">Обложка Книги</label>
			    <input type="file"
			    	   class="form-control"
			    	   name="book_cover">
			</div>

			<div class="mb-3">
			    <label class="form-label">Файл</label>
			    <input type="file"
			    	   class="form-control"
			    	   name="file">
			</div>
			<button type="submit" class="btn btn-primary">Добавить</button>
		</form>
	    </div>

	    <!-- bootstrap 5 JS bundle CDN -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>

<?php }else{
	header("Location: login.php");
	exit;
 } ?>