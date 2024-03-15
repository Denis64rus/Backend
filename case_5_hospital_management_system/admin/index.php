<?php

	session_start();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Панель Управления</title>
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

	 				<h4 class="my-2">Администратор | Панель Управления</h4>

	 				<div class="col-md-12 my-1">
	 					<div class="row">

	 						<div class="col-md-3 bg-success mx-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$ad = mysqli_query($connect,"SELECT * FROM admin");

	 											$num = mysqli_num_rows($ad);

	 										?>
	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;">
	 											<?php echo $num; ?>
	 										</h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Администраторы</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="admin.php">
	 											<i class="fa fa-users-cog fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 						<div class="col-md-3 bg-info mx-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");

	 											$num2 = mysqli_num_rows($doctor);

	 										?>
	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;">
	 											<?php echo $num2; ?>
	 										</h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Доктора</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="doctor.php">
	 											<i class="fa fa-user-md fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 						<div class="col-md-3 bg-warning mx-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$p = mysqli_query($connect,"SELECT * FROM patients");

	 											$pp = mysqli_num_rows($p);

	 										?>
	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;"><?php echo $pp; ?></h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Пациенты</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="patient.php">
	 											<i class="fa fa-procedures fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 						<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$r = mysqli_query($connect,"SELECT * FROM report");

	 											$rr = mysqli_num_rows($r);

	 										?>

	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;"><?php echo $rr; ?></h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Отчёты</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="report.php">
	 											<i class="fa fa-folder-open fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 						<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pendding'");

	 											$num1 = mysqli_num_rows($job);

	 										?>
	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;">
	 											<?php echo $num1; ?>
	 										</h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Кандидаты</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="job_request_fd.php">
	 											<i class="fa fa-user-edit fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 						<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
	 							<div class="col-md-12">
	 								<div class="row">
	 									<div class="col-md-8">
	 										<?php

	 											$in = mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");

	 											$row = mysqli_fetch_array($in);

	 											$inc = $row['profit'];

	 										?>
	 										<h5 class="my-2 text-white"
	 											style="font-size: 30px;"><?php echo "$inc ₽"; ?></h5>
	 										<h5 class="text-white">Всего</h5>
	 										<h5 class="text-white">Доход</h5>
	 									</div>
	 									<div class="col-md-4">
	 										<a href="income.php">
	 											<i class="fa fa-ruble-sign fa-3x my-4"
	 										   	   style="color: white;">
	 											</i>
	 										</a>
	 									</div>
	 								</div>
	 							</div>
	 						</div>

	 					</div>
	 				</div>

	 			</div>
	 		</div>
	 	</div>
	</div>

</body>
</html>