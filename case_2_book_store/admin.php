<?php
session_start();

    // if admin logged in
	if (isset($_SESSION['user_id']) &&
		isset($_SESSION['user_email'])) {

	// Database Connection file
	include "db_conn.php";

	// Book helper function
	include "php/func-book.php";
	$books = get_all_books($conn);

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
    	<title>Администратор</title>

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
			          			<a class="nav-link" href="add-book.php">Добавить Книгу</a>
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
			<form action="search.php"
				  method="get"
				  style="width: 100%; max-width: 30rem;">

				<div class="input-group my-5">
  					<input type="text"
  						   class="form-control"
  						   name="key"
  						   placeholder="Найти Книгу..."
  						   aria-label="Search Book..."
  						   aria-describedby="basic-addon2">
  					<button class="input-group-text btn btn-primary" id="basic-addon2">
  						<img src="img/search.png" width="20">
  					</button>
				</div>
			</form>
			<div class="mt-5"></div>
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

			<?php if ($books == 0) { ?>
				<div class="alert alert-warning text-center p-5" role="alert">
					<img src="img/empty.png" width="100"><br>
					Все книги удалены
				</div>
			<?php }else { ?>

			<!--List of All Books -->
			<h4 class="mt-5">Все Книги</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>#</th>
						<th>Заголовок</th>
						<th>Автор</th>
						<th>Описание</th>
						<th>Категория</th>
						<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 0;
						foreach ($books as $book){
						$i++;
					?>
					<tr>
						<td><?=$i?></td>
						<td>
							<img width="100" src="uploads/cover/<?=$book['cover']?>">
							<a class="link-dark d-block text-center" href="uploads/files/<?=$book['file']?>">
								<?=$book['title']?>
							</a>

						</td>
						<td>
							<?php  if ($authors == 0) {
								echo "Не определенно";}else{

								foreach ($authors as $author) {
									if ($author['id'] == $book['author_id']) {
										echo $author['name'];
									}
								}
							}
							?>
						</td>
						<td><?=$book['description']?></td>
						<td>
							<?php  if ($categories == 0) {
								echo "Не определенно";}else{

								foreach ($categories as $category) {
									if ($category['id'] == $book['category_id']) {
										echo $category['name'];
									}
								}
							}
							?>
						</td>
						<td>
							<a href="edit-book.php?id=<?=$book['id']?>" class="btn btn-warning">Редактировать</a>
							<a href="php/delete-book.php?id=<?=$book['id']?>" class="btn btn-danger">Удалить</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>

			<?php if ($categories == 0) { ?>
				<div class="alert alert-warning text-center p-5" role="alert">
					<img src="img/empty.png" width="100"><br>
					Все категории удалены
				</div>
			<?php }else { ?>

			<!--List of All Categories -->
			<h4 class="mt-5">Все Категории</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>#</th>
						<th>Категории</th>
						<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$j = 0;
						foreach ($categories as $category) {
							$j++;
					 ?>
					<tr>
						<td><?=$j?></td>
						<td><?=$category['name']?></td>
						<td>
							<a href="edit-category.php?id=<?=$category['id']?>" class="btn btn-warning">Редактировать</a>
							<a href="php/delete-category.php?id=<?=$category['id']?>" class="btn btn-danger">Удалить</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>

			<?php if ($authors == 0) { ?>
				<div class="alert alert-warning text-center p-5" role="alert">
					<img src="img/empty.png" width="100"><br>
					Все авторы удалены
				</div>
			<?php }else { ?>

			<!--List of All Authors -->
			<h4 class="mt-5">Все Авторы</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>#</th>
						<th>Авторы</th>
						<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$k = 0;
						foreach ($authors as $author) {
							$k++;
					 ?>
					<tr>
						<td><?=$k?></td>
						<td><?=$author['name']?></td>
						<td>
							<a href="edit-author.php?id=<?=$author['id']?>" class="btn btn-warning">Редактировать</a>
							<a href="php/delete-author.php?id=<?=$author['id']?>" class="btn btn-danger">Удалить</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
	    </div>

	    <!-- bootstrap 5 JS bundle CDN -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>

<?php }else{
	header("Location: login.php");
	exit;
 } ?>