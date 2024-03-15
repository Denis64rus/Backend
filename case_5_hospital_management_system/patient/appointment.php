<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Пациент - Запись на прием</title>
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
	 				<h4 class="my-2">Пациент | Запись на прием</h4>
	 				<?php

	 					$pat = $_SESSION['patient'];
	 					$sel = mysqli_query($connect,"SELECT * FROM patients WHERE username='$pat'");

	 					$row = mysqli_fetch_array($sel);

	 					$firstname = $row['firstname'];
	 					$surname = $row['surname'];
	 					$gender = $row['gender'];
	 					$phone = $row['phone'];

	 					if (isset($_POST['book'])) {

	 						$date = $_POST['date'];
	 						$sym = $_POST['sym'];

	 						if (empty($sym)) {

	 						}else {

	 							$query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date,symptoms,status,date_booked) VAlUES('$firstname','$surname','$gender','$phone','$date','$sym','Pendding',NOW())";

	 							$res = mysqli_query($connect,$query);

	 							if ($res) {

	 								echo "<script>alert('Вы записались на прием.')</script>";

	 							}

	 						}

	 					}

	 				 ?>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3"></div>
	 						<div class="col-md-6">
	 							<form method="post" style="background-color: lightcyan; padding: 46px;" class="my-2">
	 								<label>Дата приема</label>
	 								<input type="date"
	 									   name="date"
	 									   class="form-control my-2">

	 								<label>Симптомы</label>
	 								<input type="text"
	 									   name="sym"
	 									   class="form-control my-2"
	 									   autocomplete="off"
	 									   placeholder="Опишите симптомы">

	 								<input type="submit"
	 									   name="book"
	 									   class="btn btn-success my-3"
	 									   value="Записаться">
	 							</form>
	 						</div>
	 						<div class="col-md-3"></div>
	 					</div>
	 				</div>
	 			</div>
			</div>
		</div>
	</div>

</body>
</html>