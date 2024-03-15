<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, указано ли имя автора

	if (isset($_POST['author_name']) &&
		isset($_POST['author_id'])) {

		// Получаем данные из POST запроса
		// и храним их в переменной

		$name = $_POST['author_name'];
		$id = $_POST['author_id'];

		// валидация
		if (empty($name)) {
			$em = "Введите имя автора";
			header("Location: ../edit-author.php?error=$em&id=$id");
			exit;
		}else {
			// обновить БД
			$sql = "UPDATE authors SET name=? WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$name, $id]);

			// если ошибок нет при вставке данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Автор изменен";
				header("Location: ../edit-author.php?success=$sm&id=$id");
				exit;
			}else {
				// сообщение об ошибке (error message)
				$em = "Произошла ошибка";
				header("Location: ../edit-author.php?error=$em&id=$id");
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