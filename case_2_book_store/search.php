<?php
session_start();

// если ключ поиска не установлен или пуст
if (!isset($_GET['key']) || empty($_GET['key'])) {
	header("Location: index.php");
	exit;
}
$key = $_GET['key'];

// Database Connection file
include "db_conn.php";

// Book helper function
include "php/func-book.php";
$books = search_books($conn, $key);

// Author helper function
include "php/func-author.php";
$authors = get_all_authors($conn);

// Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);

 ?>
<!doctype html>
<html lang="ru">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Книжный Магазин</title>

    	<!-- bootstrap 5 CSS CDN -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    	<link rel="stylesheet" href="css/style.css">
  	</head>
 	<body>
	    <div class="container">
	    	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			 	<div class="container-fluid">
			    	<a class="navbar-brand" href="index.php">Книжный Магазин</a>
			    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      		<span class="navbar-toggler-icon"></span>
			    	</button>
			        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        		<li class="nav-item">
			          			<a class="nav-link active" aria-current="page" href="index.php">Магазин</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link" href="#">Контакты</a>
			        		</li>
			        		<li class="nav-item">
			          			<a class="nav-link" href="#">О Нас</a>
			        		</li>
			        		<li class="nav-item">
			        			<?php if (isset($_SESSION['user_id'])) { ?>
			        				<a class="nav-link" href="admin.php">Администратор</a>
			        			<?php } else{?>
			          			<a class="nav-link" href="login.php">Войти</a>
			          			<?php } ?>
			        		</li>
			        	</ul>
			    	</div>
			  	</div>
			</nav><br>
			Результат поиска для <b>"<?=$key?>"</b>

			<div class="d-flex pt-3">
				<?php if ($books == 0) { ?>
					<div class="alert alert-warning text-center p-5 pdf-list" role="alert">
						<img src="img/empty-search.png" width="100"><br>
						По запросу <b>"<?=$key?>"</b> ничего не найдено
					</div>
				<?php }else{ ?>
				<div class="pdf-list d-flex flex-wrap">
					<?php foreach ($books as $book) { ?>
					<div class="card m-1">
						<img src="uploads/cover/<?=$book['cover']?>"
							 class="card-img-top">
						<div class="card-body">
							<h5 class="card-title">
								<?=$book['title']?>
							</h5>
							<p class="card-text">
								<i><b>Автор:
									<?php foreach($authors as $author){
											if ($author['id'] == $book['author_id']) {
												echo $author['name'];
												break;
											}
									?>
									<?php } ?>
								<br></b></i>
								<?=$book['description']?>
								<br><i><b>Категория:
									<?php foreach($categories as $category){
											if ($category['id'] == $book['category_id']) {
												echo $category['name'];
												break;
											}
										?>

									<?php } ?>
								<br></b></i>
							</p>
							<a href="uploads/files/<?=$book['file']?>"
							   class="btn btn-success">Читать</a>

							<a href="uploads/files/<?=$book['file']?>"
							   class="btn btn-primary"
							   download="<?=$book['title']?>">Скачать</a>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
	    </div>

	    <!-- bootstrap 5 JS bundle CDN -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>