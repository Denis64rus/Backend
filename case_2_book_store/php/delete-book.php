<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// проверим, установлено ли id книги

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

			// получить книгу из БД
			$sql2 = "SELECT * FROM books WHERE id=?";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute([$id]);
			$the_book = $stmt2->fetch();

			if($stmt2->rowCount() > 0) {

				// удалить книгу из БД
				$sql = "DELETE FROM books WHERE id=?";
				$stmt = $conn->prepare($sql);
				$res = $stmt->execute([$id]);

				// если ошибок нет при удалении данных
				if ($res) {
					// удалить текущую обложку и файл

					$cover = $the_book['cover'];
					$file = $the_book['file'];
					$c_b_c = "../uploads/cover/$cover";
					$c_f = "../uploads/files/$cover";
					unlink($c_b_c);
					unlink($c_f);

					// сообщение об успехе (success message)
					$sm = "Книга удалена";
					header("Location: ../admin.php?success=$sm");
					exit;
				}else {
					// сообщение об ошибке (error message)
					$em = "Произошла ошибка";
					header("Location: ../admin.php?error=$em");
					exit;
				}
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