<?php

	session_start();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Пациент - Панель Управления</title>
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

					<h4 class="my-2">Пациент | Панель Управления</h4>

					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row">

								<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">Мой Профиль</h5>

											</div>
											<div class="col-md-4">
												<a href="profile.php">
													<i class="fa fa-user-circle fa-3x my-4" style="color: white;">
													</i>
												</a>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">Запись на Прием</h5>
											</div>
											<div class="col-md-4">
												<a href="appointment.php">
													<i class="fa fa-user-edit fa-3x my-4" style="color: white;">
													</i>
												</a>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">Оплата</h5>
											</div>
											<div class="col-md-4">
												<a href="invoice.php">
													<i class="fa fa-file-invoice fa-3x my-4" style="color: white;">
													</i>
												</a>
											</div>
										</div>
									</div>

								</div>


							</div>
						</div>

						<?php

							if (isset($_POST['send'])) {

								$title = $_POST['title'];
								$message = $_POST['message'];

								if (empty($title)) {
									// code...
								}else if(empty($message)){

								}else {

									$user = $_SESSION['patient'];

									$query = "INSERT INTO report(title,message,username,date_send)
											  VAlUES('$title','$message','$user',NOW())";

									$res = mysqli_query($connect,$query);

									if ($res) {

										echo "<script>alert('Письмо отправлено')<script/>";

									}

								}
							}

						 ?>

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6 bg-info my-5">
									<h5 class="text-center my-2">Написать Письмо</h5>
									<form method="post">
										<label>Тема</label>
										<input type="text"
										       name="title"
										       autocomplete="off"
										       class="form-control"
										       placeholder="Введите тему">

										<label>Текст письма</label>
										<input type="text"
										       name="message"
										       autocomplete="off"
										       class="form-control"
										       placeholder="Введите сообщение">

										<center>
											<input type="submit"
										           name="send"
										           class="btn btn-success my-3"
										           value="Отправить">
										</center>
									</form>
								</div>
								<div class="col-md-3"></div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>


</body>
</html>