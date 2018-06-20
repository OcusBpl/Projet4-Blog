<?php 

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database{

	private $db_name,
			$db_user,
			$db_pass,
			$db_host,
			$pdo;


	public function __construct($db_name, $db_user = 'dbo738153742', $db_pass = 'Thomas83', $db_host = 'db738153742.db.1and1.com'){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}
	// Gere les erreurs PDO SQL
	private function getPDO(){
		if($this->pdo === null){
			$pdo = new PDO('mysql:host=db738153742.db.1and1.com;dbname=db738153742', 'dbo738153742', 'Thomas83');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	public function query($statement, $class_name = null, $one = false){
		$req = $this->getPDO()->query($statement);
		if(
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0
		){
			return $req;

		}
		if($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if($one){
			$datas = $req->fetch();
		} else {
			$datas = $req->fetchAll();
		}
		return $datas;
	}
	// Gere les requetes preparer
	public function prepare($statement, $attributes, $class_name = null, $one = false){
		$req= $this->getPDO()->prepare($statement);
		$res = $req->execute($attributes);
		if(
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0
		){
			return $res;

		}
			
		if($class_name === null){
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if($one){
			$datas = $req->fetch();
		} else {
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function lastInsertId(){
		return $this->getPDO()->lastInsertId();
	}

}