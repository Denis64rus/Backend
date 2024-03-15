<?php
session_start();

if (isset($_POST['email']) &&
	isset($_POST['password'])) {

	// Файл соединения с БД
	include "../db_conn.php";

	// вспомогательная функция валидации
	include "func-validation.php";

	// Получаем данные из POST запроса
	// и храним их в переменной

	$email = $_POST['email'];
	$password = $_POST['password'];

	// Валидация формы
	$text = "Эл. почта";
	$location = "../login.php";
	$ms = "error";
	is_empty($email, $text, $location, $ms, "");

	$text = "Пароль";
	$location = "../login.php";
	$ms = "error";
	is_empty($password, $text, $location, $ms, "");

	// поиск по email
	$sql = "SELECT * FROM admin WHERE email=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$email]);

	// если email существует
	if ($stmt->rowCount() === 1) {
		$user = $stmt->fetch();

		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_password = $user['password'];
		if ($email === $user_email) {
			if (password_verify($password, $user_password)) {
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_email'] = $user_email;
				header("Location: ../admin.php");
			}else {
				// Сообщение об ошибке
				$em = "Неверная эл. почта или пароль";
				header("Location: ../login.php?error=$em");
			}

		}else {
			// Сообщение об ошибке
			$em = "Неверная эл. почта или пароль";
			header("Location: ../login.php?error=$em");
		}
	}else {
		// Сообщение об ошибке
		$em = "Неверная эл. почта или пароль";
		header("Location: ../login.php?error=$em");
	}

}else {
	// перенаправляем на "../login.php"
	header("Location: ../login.php");
}