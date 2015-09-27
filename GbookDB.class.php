<?php
include "IGbookDB.class.php";
class GbookDB implements IGbookDB{
	const DB_NAME = "gbook.db";
	public $_db;

	public function __construct(){
		try{
			if (!file_exists(self::DB_NAME)) {
				$this->_db = new SQLite3(self::DB_NAME);

                $sql = "CREATE TABLE msgs(
							id INTEGER PRIMARY KEY,
							name TEXT,
							email TEXT,
                            phone TEXT,
							msg TEXT,
							datetime INTEGER,
							ip TEXT)";
				$result = $this->_db->query($sql);
				if (!$result) 
					throw new Exception($this->_db->lastErrorMsg());
			}else{
				$this->_db = new SQLite3(self::DB_NAME);
			}
		}catch (Exception $exception) {
            echo $exception;
			exit("<h1>Всё плохо!</h1>");
		}
	}
//=======================================
	public function __destruct(){
		$this->_db = NULL;/* unset($this->_db);*/
	}
	//===========================
	public function savePost($name, $email, $phone, $msg){
		try{
			$dt = time();
			$ip = $_SERVER["REMOTE_ADDR"];
			$sql = "INSERT INTO msgs(
							name,
							email,
                            phone,
							msg,
							datetime,
							ip
						) VALUES(
							'$name',
							'$email',
                            '$phone',
							'$msg',
							$dt,
							'$ip')";
			$result = $this->_db->query($sql);
			if (!$result) 
				throw new Exception($this->_db->lastErrorMsg());
			return true;
		}catch (Exception $exception) {
			return false;
		}
	}
	//====================================
	public function getAll(){
		try{
			$sql = "SELECT * FROM msgs ORDER BY id DESC";
			$result_obj = $this->_db->query($sql);
            
            $result = array();
            
            while($row=$result_obj->fetchArray()){
               $result[] = $row;
            }

			if (!is_array($result)) 
				throw new Exception($this->_db->lastErrorMsg());
			return $result;
		}catch (Exception $exception) {
			return false;
		}
	}
	//==================================
	public function deletePost($id){
		try{
			$sql = "DELETE FROM msgs WHERE id = $id";
			$result = $this->_db->query($sql);
			if (!$result) 
				throw new Exception($this->_db->lastErrorMsg());
			return true;
		}catch (Exception $exception) {
			return false;
		}
	}
}
?>
