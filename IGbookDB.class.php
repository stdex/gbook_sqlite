<?php
/**
*	IGbookDB
*		содержит основные методы для работы с Гостевой книгой
*/
interface IGbookDB{
	/**
	*	bool savePost(string $name, string $email, string $msg)
	*		добавляет новую запись в Гостевую книгу
	*	Параметры:
	*		$name - имя пользователя
	*		$email - адрес электропочты пользователя
	*		$msg - текст послания пользователя
	*/
	function savePost($name, $email, $phone, $msg);
	/**
	*	array getAll(void)
	*		возвращает массив содержащий все записи из Гостевой книги
	*/
	function getAll();
	/**
	*	bool deletePost(int $id)
	*		удаляет запись из Гостевой книги
	*	Параметры:
	*		$id - идентификатор удаляемой записи
	*/
	function deletePost($id);
}
?>
