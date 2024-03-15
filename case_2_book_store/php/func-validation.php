<?php

// Функция валидации формы
function is_empty($var, $text, $location, $ms, $data){
	if (empty($var)) {
		// Сообщение об ошибке
		$em = "Введите "."'".$text."'";
		header("Location: $location?$ms=$em&$data");
		exit;
	}
	return 0;
}