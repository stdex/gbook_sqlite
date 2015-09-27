<?php
if(
	isset($_POST['name']) && !empty($_POST['name']) &&
	isset($_POST['phone']) && !empty($_POST['phone'])
){
	// Фильтруем полученные данные
	$name = $gbook->_db->escapeString(stripslashes(trim(strip_tags($_POST['name']))));
	$email = $gbook->_db->escapeString(stripslashes(trim(strip_tags(isset($_POST['email'])?$_POST['email']:""))));
    $phone = $gbook->_db->escapeString(stripslashes(trim(strip_tags($_POST['phone']))));
	$msg = $gbook->_db->escapeString(stripslashes(trim(strip_tags(isset($_POST['msg'])?$_POST['msg']:""))));
	
	$result = $gbook->savePost($name, $email, $phone, $msg);
	if(!$result){
		$errMsg = "Произошла ошибка при добавлении сообщения";
	}else{	
		/*header("Location: gbook.php");
		exit;*/
	}	
}else{
	$errMsg = "Заполните все поля формы!";
}
?>
