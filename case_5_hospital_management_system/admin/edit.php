<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Доктора - Редактировать</title>
</head>
<body>

	<?php

		include("../include/header.php");
		include("../include/connection.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -20px;">
	 				<?php

	 					include("sidenav.php");

	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h4 class="my-2">Администратор | Доктора - Редактировать</h4>
	 				<?php

	 					if (isset($_GET['id'])) {

	 						$id = $_GET['id'];

	 						$query = "SELECT * FROM doctors WHERE id='$id'";
	 						$res = mysqli_query($connect,$query);

	 						$row = mysqli_fetch_array($res);
	 					}

	 				?>
	 				<div class="row">
	 					<div class="col-md-9">

	 						<table class='table table-bordered text-center'>
	 							<tr>
	 								<th>ID</th>
	 								<th>Имя</th>
	 								<th>Фамилия</th>
	 								<th>Имя пользователя</th>
	 								<th>Эл. почта</th>
	 								<th>Номер телефона</th>
	 								<th>Пол</th>
	 								<th>Дата регистрации</th>
	 								<th>Зарплата</th>
	 							</tr>
	 							<tr>
	 								<td><?php echo $row['id']; ?></td>
	 								<td><?php echo $row['firstname']; ?></td>
	 								<td><?php echo $row['surname']; ?></td>
	 								<td><?php echo $row['username']; ?></td>
	 								<td><?php echo $row['email']; ?></td>
	 								<td>+<?php echo $row['phone']; ?></td>
	 								<td><?php echo $row['gender']; ?></td>
	 								<td><?php echo $row['data_reg']; ?></td>
	 								<td><?php echo $row['salary']; ?> ₽</td>
	 							</tr>
	 						</table>

	 					</div>
	 					<div class="col-md-3">

	 						<h5 class="text-center">Изменить Зарплату</h5>

	 						<?php

	 							if (isset($_POST['update'])) {

	 								$salary = $_POST['salary'];

	 								$q = "UPDATE doctors SET salary='$salary' WHERE id='$id'";

	 								mysqli_query($connect,$q);
	 							}

	 						 ?>

	 						<form method="post">

	 							<label>Зарплата</label>
	 							<input type="number"
	 								   name="salary"
	 								   class="form-control"
	 								   autocomplete="off"
	 								   placeholder="Введите зарплату"
	 								   value="<?php echo $row['salary']; ?>">
	 							<input type="submit"
	 								   name="update"
	 								   class="btn btn-success my-3"
	 								   value="Подтвердить">

	 						</form>

	 					</div>
	 				</div>
	 			</div>
			</div>
		</div>
	</div>

</body>
</html>