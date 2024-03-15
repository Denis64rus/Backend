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

	if (isset($_POST['book_title']) &&
		isset($_POST['book_description']) &&
		isset($_POST['book_author']) &&
		isset($_POST['book_category']) &&
		isset($_FILES['book_cover']) &&
		isset($_FILES['file'])){

		// Получаем данные из POST запроса
		// и храним их в переменной

		$title = $_POST['book_title'];
		$description = $_POST['book_description'];
		$author = $_POST['book_author'];
		$category = $_POST['book_category'];

		// создаем URL data format

		$user_input = 'title='.$title.'&category_id='.$category.'&desc='.$description.'&author_id='.$author;

		// валидация
		$text = "Название Книги";
		$location = "../add-book.php";
		$ms = "error";
		is_empty($title, $text, $location, $ms, $user_input);

		$text = "Описание Книги";
		$location = "../add-book.php";
		$ms = "error";
		is_empty($description, $text, $location, $ms, $user_input);

		$text = "Автор Книги";
		$location = "../add-book.php";
		$ms = "error";
		is_empty($author, $text, $location, $ms, $user_input);

		$text = "Категория Книги";
		$location = "../add-book.php";
		$ms = "error";
		is_empty($category, $text, $location, $ms, $user_input);

		// загрузка обложки

		$allowed_image_exs = array("jpg", "jpeg", "png");
		$path = "cover";
		$book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

		// если произошла ошибка при загрузке обложки

		if ($book_cover['status'] == "error") {
			$em = $book_cover['data'];

			// перенаправляем в '../add-book.php'
			// и передаем error message & user_input

			header("Location: ../add-book.php?error=$em&$user_input");
			exit;
		}else {

			// загрузка файла

			$allowed_file_exs = array("pdf", "docx", "pptx");
			$path = "files";
			$file = upload_file($_FILES['file'], $allowed_file_exs, $path);

			// если произошла ошибка при загрузке файла

			if ($file['status'] == "error") {
				$em = $file['data'];

				// перенаправляем в '../add-book.php'
				// и передаем error message & user_input

				header("Location: ../add-book.php?error=$em&$user_input");
				exit;
			}else {

				// получаем имена нового файла и обложки

				$file_URL = $file['data'];
				$book_cover_URL = $book_cover['data'];

				// вставляем данные в БД

				$sql = "INSERT INTO books (title, author_id, description, category_id, cover, file)
						VALUES (?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				$res = $stmt->execute([$title, $author, $description, $category, $book_cover_URL, $file_URL]);

				// если ошибок нет при вставке данных
				if ($res) {
					// сообщение об успехе (success message)
					$sm = "Книга добавлена";
					header("Location: ../add-book.php?success=$sm");
					exit;
				}else {
					// сообщение об ошибке (error message)
					$em = "Произошла ошибка";
					header("Location: ../add-book.php?error=$em");
					exit;
				}
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