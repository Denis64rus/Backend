<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Введите имя";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "Введите имя пользователя";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Введите пароль";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO users(fname, username, password) 
    	        VALUES(?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass]);

    	header("Location: ../signup.php?success=Ваш аккаунт успешно создан");
	    exit;
    }


}else {
	header("Location: ../signup.php?error=error");
	exit;
}
