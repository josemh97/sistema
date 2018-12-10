<?php 

class Administrador {
    private $pdo;
    private $id;
    private $nombre;
    private $apPaterno;
    private $apMaterno;
    private $direccion;
    private $telefono;
    private $rfc;
    private $departamento;
    private $tipoApoyo;
    private $fecha;
    private $perRecibe;

    public function __construct(){
        $this->pdo = BaseDeDatos::Conectar();
    }

    public function Cantidad(){
        try{
            $sql = "SELECT sum(cantidad) AS Cantidad FROM productos;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            //Fetch solo trae un resultado
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e){
            return "error";
        }
    }

    public function Listar(){
        try{
            $sql = "SELECT B.idBeneficiado, B.nombre, B.paterno, B.materno, B.direccion, B.telefono, B.rfc, D.nomdep, T.nomapoy, B.fechaentrega, B.perentrega FROM beneficiados B, departamento D, tipoapoyo T WHERE (B.idDepartamento = D.idDepartamento) AND (B.IdTipoApoyo = T.IdTipoApoyo);";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            return "error";
        }
    }

    public function Insertar(Administrador $p){
        try{
            $sql = "INSERT INTO beneficiados (`nombre`, `paterno`, `materno`, `direccion`, `telefono`, `rfc`, `idDepartamento`, `IdTipoApoyo`, `fechaentrega`, `perentrega`) 
            VALUES (:nombre, :apPaterno, :apMaterno, :direccion, :telefono, :rfc, :departamento, :tipoApoyo, :fecha, :perRecibe);";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindValue(":nombre", $p->getNombre());
            $consulta->bindValue(":apPaterno", $p->getApPaterno());
            $consulta->bindValue(":apMaterno", $p->getApMaterno());
            $consulta->bindValue(":direccion", $p->getDireccion());
            $consulta->bindValue(":telefono", $p->getTelefono());
            $consulta->bindValue(":rfc", $p->getRFC());
            $consulta->bindValue(":departamento", $p->getDepartamento());
            $consulta->bindValue(":tipoApoyo", $p->getTipoApoyo());
            $consulta->bindValue(":fecha", $p->getFecha());
            $consulta->bindValue(":perRecibe", $p->getPerRecibe());
            $consulta->execute();
        } catch(Exception $e){
            return "error";
        }
    }

    public function getListaDepartamentos(){
        try{
            $sql = "SELECT * FROM departamento;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            return "error";
        }
    }

    public function getListaTipoApoyos(){
        try{
            $sql = "SELECT * FROM tipoapoyo;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e){
            return "error";
        }
    }

    public function Obtener($id){
        try{
            $sql = "SELECT * FROM beneficiados WHERE idBeneficiado = :idBeneficiado;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindValue(":idBeneficiado", $id);
            $consulta->execute();
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $p = new Administrador();
            $p->setId($r->idBeneficiado);
            $p->setNombre($r->nombre);
            $p->setApPaterno($r->paterno);
            $p->setApMaterno($r->materno);
            $p->setDireccion($r->direccion);
            $p->setTelefono($r->telefono);
            $p->setRFC($r->rfc);
            $p->setDepartamento($r->idDepartamento);
            $p->setTipoApoyo($r->IdTipoApoyo);
            $p->setFecha($r->fechaentrega);
            $p->setPerRecibe($r->perentrega);
            return $p;
        } catch(Exception $e){
            return "error";
        }
    }

    public function Actualizar(Administrador $p){
        try{
            $sql = "UPDATE beneficiados SET nombre = :nombre, paterno = :apPaterno, materno = :apMaterno, direccion = :direccion, telefono = :telefono, rfc = :rfc, idDepartamento = :departamento, IdTipoApoyo = :tipoApoyo, fechaentrega = :fecha, perentrega = :perRecibe WHERE idBeneficiado = :id";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindValue(":id", $p->getId());
            $consulta->bindValue(":nombre", $p->getNombre());
            $consulta->bindValue(":apPaterno", $p->getApPaterno());
            $consulta->bindValue(":apMaterno", $p->getApMaterno());
            $consulta->bindValue(":direccion", $p->getDireccion());
            $consulta->bindValue(":telefono", $p->getTelefono());
            $consulta->bindValue(":rfc", $p->getRFC());
            $consulta->bindValue(":departamento", $p->getDepartamento());
            $consulta->bindValue(":tipoApoyo", $p->getTipoApoyo());
            $consulta->bindValue(":fecha", $p->getFecha());
            $consulta->bindValue(":perRecibe", $p->getPerRecibe());
            $consulta->execute();
        }catch(Exception $e){
            return "error";
        }
    }

    public function elimnarBeneficiado($id){
        try{
            $sql = "DELETE FROM beneficiados WHERE idBeneficiado = :id";
            $code = $this->pdo->prepare($sql);
            $code->bindValue(":id", $id);
            $code->execute();
        }catch(Exception $e){
            return "error";
        }
    }
    
    //Getters y setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApPaterno(){
        return $this->apPaterno;
    }
    public function setApPaterno($apPaterno){
        $this->apPaterno = $apPaterno;
    }

    public function getApMaterno(){
        return $this->apMaterno;
    }
    public function setApMaterno($apMaterno){
        $this->apMaterno = $apMaterno;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getRFC(){
        return $this->rfc;
    }
    public function setRFC($rfc){
        $this->rfc = $rfc;
    }
    
    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }

    public function getTipoApoyo(){
        return $this->tipoApoyo;
    }
    public function setTipoApoyo($tipoApoyo){
        $this->tipoApoyo = $tipoApoyo;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getPerRecibe(){
        return $this->perRecibe;
    }
    public function setPerRecibe($perRecibe){
        $this->perRecibe = $perRecibe;
    }

}

?>
