<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Отчёты</title>
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
	 				<h4 class="my-2">Администратор | Отчёты</h4>
	 				<?php

	 					$query = "SELECT * FROM report";
	 					$res = mysqli_query($connect,$query);

	 					$output = "";

	 					$output .= "
	 						<table class='table table-bordered text-center'>
	 							<tr>
	 								<th>ID</th>
	 								<th>Тема</th>
	 								<th>Текст</th>
	 								<th>Имя пользователя</th>
	 								<th>Дата отправки</th>
	 							</tr>
	 					";

	 					if (mysqli_num_rows($res) <1) {

	 						$output .= "
	 							<tr>
	 								<td colspan='5'>Отчётов нет</td>
	 							</tr>
	 						";

	 					}

	 					while ($row = mysqli_fetch_array($res)) {

	 						$output .= "
	 							<tr>
	 								<td>".$row['id']."</td>
	 								<td>".$row['title']."</td>
	 								<td>".$row['message']."</td>
	 								<td>".$row['username']."</td>
	 								<td>".$row['date_send']."</td>

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