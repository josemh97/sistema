<?php 

class sAdministrador {
    private $pdo;
    private $nombre;
    private $usuario;
    private $departamento;
    private $password;
    private $privilegio;

    public function __construct(){
        $this->pdo = BaseDeDatos::Conectar();
    }

    public function Registrar(sAdministrador $p){
        try{
            $sql = "INSERT INTO usuarios (`login`, `password`, `nombre`, `departamento`,  `privilegio`) VALUES (:login, :password, :nombre, :departamento, :privilegio);";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindValue(":login", $p->getUsuario());
            $consulta->bindValue(":password", $p->getPassword());
            $consulta->bindValue(":nombre", $p->getNombre());
            $consulta->bindValue(":departamento", $p->getDepartamento());
            $consulta->bindValue(":privilegio", $p->getPrivilegio());
            $consulta->execute();
        } catch(Exception $e){
            return "error";
        }
    }

    public function getDepartamentos(){
        try{
            $sql = "SELECT nomdep FROM departamento;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            return "error";
        }
    }
    
    //Getters
    public function getNombre(){
        return $this->nombre;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPrivilegio(){
        return $this->privilegio;
    }

    //Setters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }

    public function setPrivilegio($privilegio){
        $this->privilegio = $privilegio;
    }

}

?>