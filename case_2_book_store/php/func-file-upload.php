<?php

// file upload helper function
function upload_file($files, $allowed_exs, $path){

	// получаем данные и храним их в переменной

	$file_name = $files['name'];
	$tmp_name = $files['tmp_name'];
	$error = $files['error'];

	// если при загрузке не произошло ошибок

	if ($error === 0) {

		// получаем расширение файла и сохранить его в переменной

		$file_ex = pathinfo($file_name, PATHINFO_EXTENSION);

		// конвертируем расширение файла в нижний регистр
		// и храним его в переменной

		$file_ex_lc = strtolower($file_ex);

		// проверяем, существует ли расширение файла в
		// $allowed_exs массиве

		if (in_array($file_ex_lc, $allowed_exs)) {

			// переименование файла со случайными строками

			$new_file_name = uniqid("", true).'.'.$file_ex_lc;

			// назначение пути загрузки

			$file_upload_path = '../uploads/'.$path.'/'.$new_file_name;

			// перемещаем загруженный файл в root directory upload/$path folder

			move_uploaded_file($tmp_name, $file_upload_path);

			// создаем ассоциативный массив сообщений об успехе
			// со статусом и данными именованных ключей

			$sm['status'] = 'success';
			$sm['data'] = $new_file_name;

			// возвращаем sm массив

			return $sm;

		}else {

			// создаем ассоциативный массив сообщений об ошибках
			// со статусом и данными именованных ключей

			$em['status'] = 'error';
			$em['data'] = 'Вы не можете загрузить файлы данного типа';

			// возвращаем em массив

			return $em;
		}
	}else {

		// создаем ассоциативный массив сообщений об ошибках
		// со статусом и данными именованных ключей

		$em['status'] = 'error';
		$em['data'] = 'Произошла ошибка при загрузке файла!';

		// возвращаем em массив

		return $em;
	}
}