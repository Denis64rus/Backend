<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Пациент - Оплата</title>
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
	 				<h4 class="my-2">Пациент | Оплата</h4>
	 				<?php

	 					$pat = $_SESSION['patient'];

	 					$query = "SELECT * FROM patients WHERE username='$pat'";
	 					$res = mysqli_query($connect,$query);

	 					$row = mysqli_fetch_array($res);

	 					$fname = $row['firstname'];

	 					$queries = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");

	 					$output = "";

	 					$output .= "
	 						<table class='table table-bordered text-center'>
	 							<tr>
	 								<th>ID</th>
	 								<th>Доктор</th>
	 								<th>Пациент</th>
	 								<th>Дата выписки</th>
	 								<th>Стоимость</th>
	 								<th>Рекомендации</th>
	 								<th>Действие</th>
	 							</tr>
	 					";

	 					if (mysqli_num_rows($queries) <1) {

	 						$output .= "
	 							<tr>
	 								<td colspan='7'>Счетов на оплату нет</td>
	 							</tr>
	 						";

	 					}

	 					while ($row = mysqli_fetch_array($queries)) {

	 						$output .= "
	 							<tr>
	 								<td>".$row['id']."</td>
	 								<td>".$row['doctor']."</td>
	 								<td>".$row['patient']."</td>
	 								<td>".$row['date_discharge']."</td>
	 								<td>".$row['amount_paid']."</td>
	 								<td>".$row['description']."</td>
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
	 					<div class="row"></div>
	 				</div>
	 			</div>
			</div>
		</div>
	</div>

</body>
</html>