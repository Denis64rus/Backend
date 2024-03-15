<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, установлено ли id категории

	if (isset($_GET['id'])) {

		// Получаем данные из GET запроса
		// и храним их в переменной

		$id = $_GET['id'];

		// валидация
		if (empty($id)) {
			$em = "Произошла ошибка";
			header("Location: ../admin.php?error=$em");
			exit;
		}else {

			// удалить категорию из БД
			$sql = "DELETE FROM categories WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$id]);

			// если ошибок нет при удалении данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Категория удалена";
				header("Location: ../admin.php?success=$sm");
				exit;
			}else {
				$em = "Произошла ошибка";
				header("Location: ../admin.php?error=$em");
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