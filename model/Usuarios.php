<?php 

class Usuarios {
	private $pdo;

	private $login;
	private $nombre;
	private $password;

	public function __CONSTRUCT(){
		$this->pdo =BasedeDatos::Conectar();
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	//Metodos para acceder a la base de datos

	public function Validar($usuario, $password){
		try{
			$sql = "SELECT COUNT(*) as isRegistrado, privilegio, login, nombre FROM usuarios WHERE login = :usuario AND password = :password";
            $code = $this->pdo->prepare($sql);
			$code->bindValue(":usuario", $usuario);
			$code->bindValue(":password", $password);
			$code->execute();
			return $code->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}	
	}

}	