<?php

	include("../include/connection.php");

	$query = "SELECT * FROM doctors WHERE status='Pendding' ORDER BY data_reg ASC";
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
				<td colspan='9' class='text-center'>Кандидатов на работу нет.</td>
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
					<div class='col-md-12'>
						<div class='row'>
							<div class='col-md-6'>
								<button id='".$row['id']."' class='btn btn-success approve'>Утвердить</button>
							</div>
							<div class='col-md-6'>
								<button id='".$row['id']."' class='btn btn-danger reject'>Отклонить</button>
							</div>
						</div>
					</div>
				</td>
		";
	}

		$output .= "
			</tr>
		</table>
		";

		echo $output;

 ?>