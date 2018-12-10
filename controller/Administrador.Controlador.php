<?php 

require_once "model/Administrador.php";

class AdministradorControlador {
    private $modelo;

    public function __construct(){
        $this->modelo = new Administrador();
        if($_SESSION["privilegio"] != "Administrador"){
            header("Location: index.php");
        }
    }

    public function Inicio(){
        $beneficiados = $this->modelo->Listar();
        require_once "view/header.php";
        require_once "view/administrador/inicio.php";
        require_once "view/footer.php";
    }

    public function Guardar(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
        $prod = new Administrador();
        $prod->setId($_POST["id"]);
        $prod->setNombre($_POST["nombre"]);
        $prod->setApPaterno($_POST["apPaterno"]);
        $prod->setapMaterno($_POST["apMaterno"]);
        $prod->setDireccion($_POST["direccion"]);
        $prod->setTelefono($_POST["telefono"]);
        $prod->setRFC($_POST["rfc"]);
        $prod->setDepartamento($_POST["departamento"]);
        $prod->setTipoApoyo($_POST["tipoApoyo"]);
        $prod->setFecha($_POST["fecha"]);
        $prod->setPerRecibe($_POST["perRecibe"]);


        if($prod->getId() > 0){
            if($this->modelo->Actualizar($prod) == "error"){
                $errores = "Algo ha salido mal, por favor verifique los campos";
                $departamentos = $this->modelo->getListaDepartamentos();
                $apoyos = $this->modelo->getListaTipoApoyos();
                require_once "view/header.php";
                require_once "view/administrador/registrarBeneficiados.php";
                require_once "view/footer.php";
            }
        } else {
            if($this->modelo->Insertar($prod) == "error"){
                $errores = "Algo ha salido mal, por favor verifique los campos";
                $departamentos = $this->modelo->getListaDepartamentos();
                $apoyos = $this->modelo->getListaTipoApoyos();
                require_once "view/header.php";
                require_once "view/administrador/registrarBeneficiados.php";
                require_once "view/footer.php";
            }
        }
        
        header("location:?c=Administrador");
    }

    public function FormAgregar(){
        $departamentos = $this->modelo->getListaDepartamentos();
        $apoyos = $this->modelo->getListaTipoApoyos();
        $p = new Administrador();
        $titulo = "Agregar";
        if(isset($_GET["id"])){
            $p = $this->modelo->Obtener($_GET["id"]);
            $titulo = "Modificar";
        }
        require_once "view/header.php";
        require_once "view/administrador/registrarBeneficiados.php";
        require_once "view/footer.php";
    }

    public function eliminar(){
        if(isset($_GET["id"])){
            $this->modelo->elimnarBeneficiado($_GET["id"]);
            header("location:?c=Administrador");
        }
    }

}

?>