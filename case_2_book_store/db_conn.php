<?php

// имя сервера
$sName = "localhost";

// имя пользователя
$uName = "root";

// пароль
$pass = "";

// имя базы данных
$db_name = "book_store_db";

// создаем соединение с базой данных (db_conn),
// используем Объекты Данных PHP (THE PHP Data Objects (PDO))

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
	echo "Соединение не установлено : ". $e->getMessage();
}
