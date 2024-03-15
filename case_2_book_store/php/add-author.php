<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, указано ли имя автора

	if (isset($_POST['author_name'])) {
		// Получаем данные из POST запроса
		// и храним их в переменной
		$name = $_POST['author_name'];

		// валидация
		if (empty($name)) {
			$em = "Введите имя автора";
			header("Location: ../add-author.php?error=$em");
			exit;
		}else {
			// вставить в БД
			$sql = "INSERT INTO authors (name) VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$name]);

			// если ошибок нет при вставке данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Автор добавлен";
				header("Location: ../add-author.php?success=$sm");
				exit;
			}else {
				// сообщение об ошибке (error message)
				$em = "Произошла ошибка";
				header("Location: ../add-author.php?error=$em");
				exit;
			}
		}
	}else {
		header("Location: ../admin.php");
		exit;
	}

}else{
	header("Location: ../login.php");
	exit;
}