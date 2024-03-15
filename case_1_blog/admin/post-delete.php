<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['post_id']) {

$post_id = $_GET['post_id'];

	include_once("data/post.php");
	include_once("data/comment.php");
	include_once("../db_conn.php");
	$res = deleteById($conn, $post_id);
	$res2 = deleteCommentByPostId($conn, $post_id);
	$res3 = deleteLikeByPostId($conn, $post_id);
	if ($res) {
		$sm = "Пост Удален";
		header("Location: post.php?success=$sm");
		exit;
	}else {
		$em = "Ошибка";
		header("Location: post.php?error=$em");
		exit;
	}



}else {
	header("Location: ../admin-login.php");
	exit;
}