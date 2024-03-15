<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Доход</title>
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
	 				<h4 class="my-2">Администратор | Доход</h4>
	 				<?php

	 					$query = "SELECT * FROM income";
	 					$res = mysqli_query($connect,$query);

	 					$output = "";

	 					$output .= "
	 						<table class='table table-bordered text-center'>
	 							<tr>
	 								<th>ID</th>
	 								<th>Доктор</th>
	 								<th>Пациент</th>
	 								<th>Дата выписки</th>
	 								<th>Оплата</th>
	 							</tr>
	 					";

	 					if (mysqli_num_rows($res) <1) {

	 						$output .= "
	 							<tr>
	 								<td colspan='5'>Выписанных пациентов нет</td>
	 							</tr>
	 						";

	 					}

	 					while ($row = mysqli_fetch_array($res)) {

	 						$output .= "
	 							<tr>
	 								<td>".$row['id']."</td>
	 								<td>".$row['doctor']."</td>
	 								<td>".$row['patient']."</td>
	 								<td>".$row['date_discharge']."</td>
	 								<td>".$row['amount_paid']."</td>

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