<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Доктор - Пациенты</title>
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
	 				<h4 class="my-2">Доктор | Пациенты</h4>

	 				<?php

	 					$query = "SELECT * FROM patients";

	 					$res = mysqli_query($connect,$query);

	 					$output = "";

	 					$output .= "
	 						<table class='table table-bordered text-center'>
	 							<tr>
	 								<th>ID</th>
	 								<th>Имя</th>
	 								<th>Фамилия</th>
	 								<th>Имя пользователя</th>
	 								<th>Эл. почта</th>
	 								<th>Пол</th>
	 								<th>Номер телефона</th>
	 								<th>Дата регистрации</th>
	 								<th>Действие</th>
	 							</tr>
	 					";

	 					if (mysqli_num_rows($res) < 1) {

	 						$output .= "
	 							<tr>
	 								<td class='text-center' colspan='9'>Пациентов нет</td>
	 							</tr>
	 						";

	 					}

	 					while ($row = mysqli_fetch_array($res)) {

	 						$output .= "
	 							<tr>
	 								<td>".$row['id']."</td>
	 								<td>".$row['firstname']."</td>
	 								<td>".$row['surname']."</td>
	 								<td>".$row['username']."</td>
	 								<td>".$row['email']."</td>
	 								<td>".$row['gender']."</td>
	 								<td>".$row['phone']."</td>
	 								<td>".$row['data_reg']."</td>
	 								<td>
	 									<a href='view.php?id=".$row['id']."'>
	 										<button class='btn btn-info'>Смотреть</button>
	 									</a>
	 								</td>
	 						";

	 					}

	 					$output .= "
	 							</tr>
	 						</table>
	 					";

	 					echo $output;

	 				 ?>

	 				<div class="col-md-12">
	 					<div class="row">

	 					</div>
	 				</div>
	 			</div>
			</div>
		</div>
	</div>

</body>
</html>