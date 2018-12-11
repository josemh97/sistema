<?php 

require_once "model/usuarios.php";

class InicioControlador {

    private $modelo;

    public function __construct(){
        $this->modelo = new Usuarios();
    }

    public function Inicio(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = strval($_POST["usuario"]);
            $password = strval($_POST["password"]);
            $ingreso = $this->modelo->Validar($usuario, $password);
            $_SESSION['usuario'] = $ingreso->login;
            $_SESSION['nombre'] = $ingreso->nombre;
            $_SESSION['privilegio'] = $ingreso->privilegio;
            if($ingreso->isRegistrado == "1" && $ingreso->privilegio == "sAdministrador"){
                header("Location: index.php?c=sAdministrador");
            } else if($ingreso->isRegistrado == "1" && $ingreso->privilegio == "Administrador"){
                header("Location: index.php?c=Administrador");
            } else {
                $error = "Nombre de usuario o contraseña incorrecta";
                require_once "view/header.php";
                require_once "view/inicio/principal.php";
                require_once "view/footer.php";    
            }
        } else {
            require_once "view/header.php";
            require_once "view/inicio/principal.php";
            require_once "view/footer.php";
        }
    }

    public function Cerrar(){
        unset($_SESSION["usuario"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION['privilegio']);
        session_destroy();
        header("location: index.php");
    }
}

?>