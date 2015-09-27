<?php
$del = $_GET['del'] * 1;
if($del === 0){
	$errMsg = "Хакер, не ломай мою Гостевую книгу!";
}else{
	$result = $gbook->deletePost($del);
	if(!$result){
		$errMsg = "Произошла ошибка при удалении сообщения";
	}else{
		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}
}
?>