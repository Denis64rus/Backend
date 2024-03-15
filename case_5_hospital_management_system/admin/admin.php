<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Администраторы</title>
</head>
<body>

	<?php

		include("../include/header.php");

	 ?>

	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -20px;">
	 				<?php

	 					include("sidenav.php");
	 					include("../include/connection.php");

	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h4 class="my-2">Администратор | Администраторы</h4>
	 				<div class="col-md-12">
	 					<div class="row">

	 						<div class="col-md-6">
	 							<h5 class="text-center">Администраторы</h5>

	 							<?php

	 								$ad = $_SESSION['admin'];
	 								$query = "SELECT * FROM admin WHERE username !='$ad'";
	 								$res = mysqli_query($connect,$query);

	 								$output = "
	 									<table class='table table-bordered text-center'>
	 										<tr>
		 										<th>ID</th>
		 										<th>Имя пользователя</th>
		 										<th style='width: 10%;'>Действие</th>
	 										</tr>
	 								";

	 								if (mysqli_num_rows($res) < 1) {
	 									$output .= "<tr><td colspan='3' class='text-center'>Нет Нового Администратора</td></tr>";
	 								}

	 								while ($row = mysqli_fetch_array($res)) {
	 									$id = $row['id'];
	 									$username = $row['username'];

	 									$output .= "
	 										<tr>
	 											<td>$id</td>
	 											<td>$username</td>
	 											<td>
	 												<a href='admin.php?id=$id'>
	 													<button id='$id' class='btn btn-danger remove'>Удалить</button>
	 												</a>
	 											</td>
	 									";
	 								}

	 								$output .="
			 								</tr>
			 							</table>
	 								";

	 								echo $output;


	 								if (isset($_GET['id'])) {

	 									$id = $_GET['id'];

	 									$query = "DELETE FROM admin WHERE id='$id'";
	 									mysqli_query($connect,$query);

	 								}

	 							?>

	 						</div>

	 						<div class="col-md-6">
	 							<?php

	 								if (isset($_POST['add'])) {

	 									$uname = $_POST['uname'];
	 									$pass = $_POST['pass'];
	 									$image = $_FILES['img']['name'];

	 									$error = array();

	 									if (empty($uname)) {
	 										$error['u'] = "Введите Имя пользователя";
	 									}else if(empty($pass)){
	 										$error['u'] = "Введите Пароль";
	 									}else if(empty($image)){
	 										$error['u'] = "Загрузите Фотографию";
	 									}

	 									if (count($error) == 0) {

	 										$q = "INSERT INTO admin(username,password,profile)
	 											  VALUES('$uname','$pass','$image')";

	 										$result = mysqli_query($connect,$q);

	 										if ($result) {

	 											move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");

	 										}else {

	 										}
	 									}
	 								}

	 								if (isset($error['u'])) {
	 									$er = $error['u'];

	 									$show = "<h6 class='text-center alert alert-danger'>$er</h6>";

	 								}else {

	 									$show = "";

	 								}

	 							 ?>
	 							<h5 class="text-center">Добавить Администратора</h5>
	 							<form method="post" enctype="multipart/form-data">

	 								<div>
	 									<?php echo $show; ?>
	 								</div>

	 								<div class="from-group">
	 									<label>Имя пользователя</label>
	 									<input type="text"
	 										   name="uname"
	 										   class="form-control"
	 										   autocomplete="off">
	 								</div>

	 								<div class="form-group">
	 									<label>Пароль</label>
	 									<input type="password"
	 										   name="pass"
	 										   class="form-control"
	 										   autocomplete="off">
	 								</div>

	 								<div class="form-group">
	 									<label>Загрузить фотографию</label>
	 									<input type="file"
	 										   name="img"
	 										   class="form-control">
	 								</div><br>

	 								<input type="submit"
	 									   name="add"
	 									   value="Добавить"
	 									   class="btn btn-success">

	 							</form>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>