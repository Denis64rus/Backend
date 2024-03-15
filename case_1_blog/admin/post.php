<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Панель управления - Посты</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
	$key = "hhdsfs1263z";
	include "inc/side-nav.php";
	include_once("data/post.php");
	include_once("data/comment.php");
	include_once("../db_conn.php");
	$posts = getAllDeep($conn);
?>

	<div class="main-table">
		<h3 class="mb-3">Посты
			<a href="post-add.php" class="btn btn-success">Добавить</a></h3>
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

		<?php if ($posts != 0) { ?>
		<table class="table t1 table-bordered">
		 	<thead>
		    	<tr>
		      		<th scope="col">#</th>
		      		<th>Заголовок</th>
		      		<th>Категория</th>
		      		<th>Комментарии</th>
		      		<th>Нравится</th>
		      		<th>Действие</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($posts as $post) {
		  			$category = getCategoryById($conn, $post['category']);
		  		?>
		    	<tr>
		      		<th scope="row"><?=$post['post_id'] ?></th>
				    <td><a href="single_post.php?post_id=<?=$post['post_id'] ?>"><?=$post['post_title'] ?></a></td>
				    <td>
				    	<?=$category['category']?>
				    </td>
				    <td>
				    	<i class="fa fa-comment" aria-hidden="true"></i>
				    	<?php
				    		echo CountByPostID($conn, $post['post_id']);
				    	?>
				    </td>
				    <td><i class="fa fa-thumbs-up" aria-hidden="true"></i>
				    	<?php
				    		echo likeCountByPostID($conn, $post['post_id']);
				    	?>
				    </td>
				     <td>
				     	<a href="post-delete.php?post_id=<?=$post['post_id'] ?>" class="btn btn-danger">Удалить</a>
				     	<a href="post-edit.php?post_id=<?=$post['post_id'] ?>" class="btn btn-warning">Редактировать</a>
				     	<?php
				     		if ($post['publish'] == 1) {
				     	 ?>
				     	<a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link disabled">Публиковать</a>
				     	<a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link">Не Публиковать</a>
				     	<?php }else{ ?>
				     		<a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link">Публиковать</a>
				     		<a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link disabled">Не Публиковать</a>
				     	<?php } ?>
				     </td>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
		<?php }else{ ?>
			<div class="alert alert-warning">
				Пусто
			</div>
		<?php } ?>
	</div>
	</section>
	</div>
	<div>
		<script>
			var navList = document.getElementById('navList').children;
			navList.item(1).classList.add("active");
		</script>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>