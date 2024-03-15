<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, указано ли имя категории

	if (isset($_POST['category_name']) &&
		isset($_POST['category_id'])) {

		// Получаем данные из POST запроса
		// и храним их в переменной

		$name = $_POST['category_name'];
		$id = $_POST['category_id'];

		// валидация
		if (empty($name)) {
			$em = "Введите имя категории";
			header("Location: ../edit-category.php?error=$em&id=$id");
			exit;
		}else {
			// обновить БД
			$sql = "UPDATE categories SET name=? WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$name, $id]);

			// если ошибок нет при обновлении данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Категория изменена";
				header("Location: ../edit-category.php?success=$sm&id=$id");
				exit;
			}else {
				// сообщение об ошибке (error message)
				$em = "Произошла ошибка";
				header("Location: ../edit-category.php?error=$em&id=$id");
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