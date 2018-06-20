<?php 

namespace Core\Auth;

use Core\Database\Database;

/**
* objet authentification administrateur
*/
class DBAuth {

	private $db;
	
	public function __construct(Database $db){
		$this->db = $db;
		
	}

	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth']; // demarre la session si le client s'est logé pour eviter d''avoir a le refaire
		}
		return false;
	}


	/**
	*@param $username
	*@param $password
	*@return boolean
	*/
	public function login($username, $password){
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		if($user){
			if($user->password === sha1($password)){
				$_SESSION['auth'] = $user->id;
				return true; // si true les ident sont correct -> redirection vers admin et fonction logged()
			}
		}
		return false;
	}

	public function logged(){
		return isset($_SESSION['auth']);
	}

}