<?php 

require_once "model/sAdministrador.php";
require_once "model/Administrador.php";
require_once "model/Usuarios.php";

class sAdministradorControlador {
    private $modelo;
    private $modeloAdmin;

    public function __construct(){
        $this->modelo = new sAdministrador();
        $this->modeloAdmin = new Administrador();
        if($_SESSION["privilegio"] != "sAdministrador"){
            header("Location: index.php");
        }
    }

    public function Inicio(){
        $beneficiados = $this->modeloAdmin->Listar();
        require_once "view/header.php";
        require_once "view/superAdmin/inicio.php";
        require_once "view/footer.php";
    }

    public function FormAgregar(){
        $departamentos = $this->modeloAdmin->getListaDepartamentos();
        $apoyos = $this->modeloAdmin->getListaTipoApoyos();
        $p = new Administrador();
        $titulo = "Agregar";
        if(isset($_GET["id"])){
            $p = $this->modeloAdmin->Obtener($_GET["id"]);
            $titulo = "Modificar";
        }
        require_once "view/header.php";
        require_once "view/superAdmin/registrarBeneficiados.php";
        require_once "view/footer.php";
    }

    public function FormAgregarAdmin(){
        $departamentos = $this->modelo->getDepartamentos();
        require_once "view/header.php";
        require_once "view/superAdmin/registrarAdmin.php";
        require_once "view/footer.php";
    }

    public function eliminar(){
        if(isset($_GET["id"])){
            $this->modeloAdmin->elimnarBeneficiado($_GET["id"]);
            header("location:?c=sAdministrador");
        }
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
            if($this->modeloAdmin->Actualizar($prod) == "error"){
                $errores = "Algo ha salido mal, por favor verifique los campos";
                $departamentos = $this->modeloAdmin->getListaDepartamentos();
                $apoyos = $this->modeloAdmin->getListaTipoApoyos();
                require_once "view/header.php";
                require_once "view/superAdmin/registrarBeneficiados.php";
                require_once "view/footer.php";
            }
        } else {
            if($this->modeloAdmin->Insertar($prod) == "error"){
                $errores = "Algo ha salido mal, por favor verifique los campos";
                $departamentos = $this->modeloAdmin->getListaDepartamentos();
                $apoyos = $this->modeloAdmin->getListaTipoApoyos();
                require_once "view/header.php";
                require_once "view/superAdmin/registrarBeneficiados.php";
                require_once "view/footer.php";
            }
        }
        
        header("location:?c=sAdministrador");
    }

    public function Registrar(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
        $administrador = new sAdministrador();
        $administrador->setNombre($_POST["nombre"]);
        $administrador->setUsuario($_POST["usuario"]);
        $administrador->setDepartamento($_POST["departamento"]);
        //$administrador->setPassword($_POST["password"]);
        $administrador->setPassword(hash("sha256", $_POST["password"]));
        $administrador->setPrivilegio($_POST["privilegio"]);
        if($_POST["password"] == $_POST["confirmarPasswd"]){
            if($this->modelo->Registrar($administrador) == "error"){
                $departamentos = $this->modelo->getDepartamentos();
                $errores = "Algo ha salido mal, por favor verifique los campos";
                require_once "view/header.php";
                require_once "view/superAdmin/inicio.php";
                require_once "view/footer.php";
            }
            $_SESSION["mensajes"] = "Usuario registrado";
            header("Location: ?c=sAdministrador");
        } else {
            $departamentos = $this->modelo->getDepartamentos();
            $errores = "Las contraseñas no coinciden";
            require_once "view/header.php";
            require_once "view/superAdmin/inicio.php";
            require_once "view/footer.php";
        }
    }

    public function validarusuario()
    {
        $modelo = new Usuarios();
        $flag=false;
        $user=$_GET['u'];
        $ingreso = $modelo->Existe($user);
        if($ingreso->isRegistrado == "1"){
            $flag=true;
        }

        echo $flag;
    }
}

?>