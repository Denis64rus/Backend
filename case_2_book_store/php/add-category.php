<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, указано ли имя категории

	if (isset($_POST['category_name'])) {
		// Получаем данные из POST запроса
		// и храним их в переменной
		$name = $_POST['category_name'];

		// валидация
		if (empty($name)) {
			$em = "Введите имя категории";
			header("Location: ../add-category.php?error=$em");
			exit;
		}else {
			// вставить в БД
			$sql = "INSERT INTO categories (name) VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$name]);

			// если ошибок нет при вставке данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Категория добавлена";
				header("Location: ../add-category.php?success=$sm");
				exit;
			}else {
				// сообщение об ошибке (error message)
				$em = "Произошла ошибка";
				header("Location: ../add-category.php?error=$em");
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