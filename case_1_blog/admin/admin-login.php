<?php
session_start();

if(isset($_POST['uname']) &&
   isset($_POST['pass'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;

    if(empty($uname)){
    	$em = "Введите имя пользователя";
    	header("Location: ../admin-login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Введите пароль";
    	header("Location: ../admin-login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM admin WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $id =  $user['id'];
          if($username === $uname){
             if(password_verify($pass, $password)){
                 $_SESSION['admin_id'] = $id;
                 $_SESSION['username'] = $username;

                 header("Location: users.php");
                 exit;
             }else {
               $em = "Неверное имя пользователя или пароль";
               header("Location: ../admin-login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Неверное имя пользователя или пароль";
            header("Location: ../admin-login.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Неверное имя пользователя или пароль";
         header("Location: ../admin-login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../admin-login.php?error=error");
	exit;
}
