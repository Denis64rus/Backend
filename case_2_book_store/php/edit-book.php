<?php
session_start();

// if admin logged in
if (isset($_SESSION['user_id']) &&
	isset($_SESSION['user_email'])) {

	// Database Connection file
	include "../db_conn.php";

	// Validation helper function
	include "func-validation.php";

	// File Upload helper function
	include "func-file-upload.php";

	// если все поля ввода заполнены

	if (isset($_POST['book_id']) &&
		isset($_POST['book_title']) &&
		isset($_POST['book_description']) &&
		isset($_POST['book_author']) &&
		isset($_POST['book_category']) &&
		isset($_FILES['book_cover']) &&
		isset($_FILES['file']) &&
		isset($_POST['current_cover']) &&
		isset($_POST['current_file'])) {

		// Получаем данные из POST запроса
		// и храним их в переменной

		$id = $_POST['book_id'];
		$title = $_POST['book_title'];
		$description = $_POST['book_description'];
		$author = $_POST['book_author'];
		$category = $_POST['book_category'];

		// получить текущую обложку и текущий файл
		// из POST запроса и хранить их в переменной

		$current_cover = $_POST['current_cover'];
		$current_file = $_POST['current_file'];

		// валидация
		$text = "Название Книги";
		$location = "../edit-book.php";
		$ms = "id=$id&error";
		is_empty($title, $text, $location, $ms, "");

		$text = "Описание Книги";
		$location = "../edit-book.php";
		$ms = "id=$id&error";
		is_empty($description, $text, $location, $ms, "");

		$text = "Автор Книги";
		$location = "../edit-book.php";
		$ms = "id=$id&error";
		is_empty($author, $text, $location, $ms, "");

		$text = "Категория Книги";
		$location = "../edit-book.php";
		$ms = "id=$id&error";
		is_empty($category, $text, $location, $ms, "");

		// если админ попытается обновить обложку

		if (!empty($_FILES['book_cover']['name'])) {

			// если админ попытается обновить обложку и имя
			if (!empty($_FILES['file']['name'])) {

				// обновить обложку и имя

				// загрузка обложки

				$allowed_image_exs = array("jpg", "jpeg", "png");
				$path = "cover";
				$book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

				// загрузка файла

				$allowed_file_exs = array("pdf", "docx", "pptx");
				$path = "files";
				$file = upload_file($_FILES['file'], $allowed_file_exs, $path);

				// если произошла ошибка при загрузке

				if ($book_cover['status'] == "error" ||
					$file['status'] == "error") {

					$em = $book_cover['data'];

					// перенаправляем в '../edit-book.php'
					// и передаем error message & id

					header("Location: ../edit-book.php?error=$em&id=$id");
					exit;
				}else {
					// текущий путь обложки
					$c_p_book_cover = "../uploads/cover/$current_cover";

					// текущий путь файла
					$c_p_file = "../uploads/files/$current_file";

					// удалить с сервера
					unlink($c_p_book_cover);
					unlink($c_p_file);

					// получаем имена новых файла и обложки
					$file_URL = $file['data'];
					$book_cover_URL = $book_cover['data'];

					// обновить только данные
					$sql = "UPDATE books SET title=?, author_id=?, description=?, category_id=?, cover=?, file=?
							WHERE id=?";
					$stmt = $conn->prepare($sql);
					$res = $stmt->execute([$title, $author, $description, $category, $book_cover_URL, $file_URL, $id]);

					// если ошибок нет при обновлении данных
					if ($res) {
						// сообщение об успехе (success message)
						$sm = "Успешно изменено";
						header("Location: ../edit-book.php?success=$sm&id=$id");
						exit;
					}else {
						// сообщение об ошибке (error message)
						$em = "Произошла ошибка";
						header("Location: ../edit-book.php?error=$em&id=$id");
						exit;
					}
				}
			}else {

				// обновить только обложку

				// загрузка обложки

				$allowed_image_exs = array("jpg", "jpeg", "png");
				$path = "cover";
				$book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

				// если произошла ошибка при загрузке

				if ($book_cover['status'] == "error") {

					$em = $book_cover['data'];

					// перенаправляем в '../edit-book.php'
					// и передаем error message & id

					header("Location: ../edit-book.php?error=$em&id=$id");
					exit;
				}else {
					// текущий путь обложки
					$c_p_book_cover = "../uploads/cover/$current_cover";

					// удалить с сервера
					unlink($c_p_book_cover);

					// получаем имена новых файла и обложки
					$book_cover_URL = $book_cover['data'];

					// обновить только данные
					$sql = "UPDATE books SET title=?, author_id=?, description=?, category_id=?, cover=?
							WHERE id=?";
					$stmt = $conn->prepare($sql);
					$res = $stmt->execute([$title, $author, $description, $category, $book_cover_URL, $id]);

					// если ошибок нет при обновлении данных
					if ($res) {
						// сообщение об успехе (success message)
						$sm = "Успешно изменено";
						header("Location: ../edit-book.php?success=$sm&id=$id");
						exit;
					}else {
						// сообщение об ошибке (error message)
						$em = "Произошла ошибка";
						header("Location: ../edit-book.php?error=$em&id=$id");
						exit;
					}
				}

			}
		}

		// если админ попытается обновить только файл
		else if(!empty($_FILES['file']['name'])){

			// обновить только файл

			// загрузка обложки

			$allowed_file_exs = array("pdf", "docx", "pptx");
			$path = "files";
			$file = upload_file($_FILES['file'], $allowed_file_exs, $path);

			// если произошла ошибка при загрузке

			if ($file['status'] == "error") {

				$em = $file['data'];

				// перенаправляем в '../edit-book.php'
				// и передаем error message & id

				header("Location: ../edit-book.php?error=$em&id=$id");
				exit;
			}else {
				// текущий путь файла
				$c_p_file = "../uploads/files/$current_file";

				// удалить с сервера
				unlink($c_p_file);

				// получаем имя нового файла
				$file_URL = $file['data'];

				// обновить только данные
				$sql = "UPDATE books SET title=?, author_id=?, description=?, category_id=?, file=?
							WHERE id=?";
				$stmt = $conn->prepare($sql);
				$res = $stmt->execute([$title, $author, $description, $category, $file_URL, $id]);

				// если ошибок нет при обновлении данных
				if ($res) {
					// сообщение об успехе (success message)
					$sm = "Успешно изменено";
					header("Location: ../edit-book.php?success=$sm&id=$id");
					exit;
				}else {
					// сообщение об ошибке (error message)
					$em = "Произошла ошибка";
					header("Location: ../edit-book.php?error=$em&id=$id");
					exit;
				}
			}

		}else {

			// обновить только данные
			$sql = "UPDATE books SET title=?, author_id=?, description=?, category_id=?
					WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res = $stmt->execute([$title, $author, $description, $category, $id]);

			// если ошибок нет при обновлении данных
			if ($res) {
				// сообщение об успехе (success message)
				$sm = "Успешно изменено";
				header("Location: ../edit-book.php?success=$sm&id=$id");
				exit;
			}else {
				// сообщение об ошибке (error message)
				$em = "Произошла ошибка";
				header("Location: ../edit-book.php?error=$em&id=$id");
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