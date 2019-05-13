<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once __dir__ . "/app/controlador/controlador.php";

include_once "vendor/autoload.php";


$mvc = new controlador();

if ($mvc->iniciar_sesion()) {
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) {
        case 'index':
            $mvc->index();
            break; 
        case 'productos':
            $mvc->productos();
            break;
            case 'factura':
                $mvc->factura();
                break;

            case 'getprod':
            $mvc->getprod();
            break;
        case 'ventas':
                $mvc->ventas();
                break;
            case 'realizadas':
                $mvc->realizadas();
                break;
        case 'inventario':
            $mvc->inventario();
            break; 
            
        case 'proveedor':
            $mvc->proveedor();
            break; 

        case 'empresa':
            $mvc->cliente_empresa();
            break;

        case 'getinv':
            $mvc->getinv();
            break; 
        
        case 'getprov':
            $mvc->getprov();
            break; 
        case 'getempresa':
            $mvc->getempresa();
            break;
        case 'getpersona':
            $mvc->getpersona();
            break; 

        case 'cliente_persona':
            $mvc->cliente_persona();
            break;
        case 'usuarios':
            $mvc->usuarios();
            break;
        case 'getuser':
            $mvc->getuser();
            break;
        case 'getdatosventa':
            $mvc->getdatosventa();
            break;
        case 'cerrar':
            $mvc->cerrar_sesion();
            
            break;
        /*---------------------------------- */
        default:
        $mvc->index();
            break;
        }
    } else {
        $mvc->index();
    }
} else {
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) { 
        case 'login':
            $mvc->login();
            break;
        case 'validar':
            $mvc->validar();
            break;
        default:
            $mvc->login();
            break;
        }
    } else {
        $mvc->login();
    }
}
?>