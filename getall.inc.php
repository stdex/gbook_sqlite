<?php
include "GbookDB.class.php";
$gbook = new GbookDB();
$result = $gbook->getAll();
if(!is_array($result)){
	$errMsg = "Произошла ошибка при выводе записей";
}else{
	echo "<p>Всего записей в Гостевой книге: ".count($result)."</p>";
	foreach($result as $item){
		$id = $item['id'];
		$name = $item['name'];
		$email = $item['email'];
        $phone = $item['phone'];
		$msg = nl2br($item['msg']);
		$ip = $item['ip'];
		$datetime = date("d-m-Y H:i:s",$item['datetime']*1);

		echo <<<LABEL
		<hr>
		<p>
			<b><a href="mailto:$email">$name</a></b> [$ip] @ $datetime
			<br />$msg
		</p>
		<p align="right">
			<a href="{$_SERVER['PHP_SELF']}?del=$id">Удалить</a>
		</p>
LABEL;
	}	
}
?>
