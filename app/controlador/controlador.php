<?php

require_once __dir__ . "/../modelo/getDatos.php";
class controlador {
    public static $rutaAPP = "/Appescaes/";

    public function iniciar_sesion() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["id_usr"])) {
            return true;
        }
        return false;
    }

    public function cerrar_sesion() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->login();
    }
    public function factura() {
        include_once __dir__ . "/../vista/facturas/facturadompdf.php";
    }
    public function realizadas() {
        include_once __dir__ . "/../vista/vrealizadas.php";
    }
    public function index() {
        include_once __dir__ . "/../vista/index.php";
    }
    public function login() {
        include_once __dir__ . "/../vista/login.php";
    }
    public function productos() {
        include_once __dir__ . "/../vista/productos.php";
    }
    public function ventas() {
        include_once __dir__ . "/../vista/ventas.php";
    }
    public function inventario() {
        include_once __dir__ . "/../vista/inventario.php";
    }
    public function proveedor() {
        include_once __dir__ . "/../vista/proveedores.php";
    }
    public function cliente_empresa() {
        include_once __dir__ . "/../vista/cliente_empresa.php";
    }
    public function cliente_persona() {
        include_once __dir__ . "/../vista/cliente_persona.php";
    }
    public function usuarios() {
        include_once __dir__ . "/../vista/usuarios.php";
    }
    public function validar() {
        include_once __dir__ . "/../vista/php/validarlogin.php";
    }
    public function getprod() {
        include_once __dir__ . "/../vista/php/get_prod.php";
    }
    public function getinv() {
        include_once __dir__ . "/../vista/php/get_inventario.php";
    }
    public function getprov() {
        include_once __dir__ . "/../vista/php/get_prov.php";
    }
    public function getempresa() {
        include_once __dir__ . "/../vista/php/get_clie_Empresa.php";
    }
    public function getpersona() {
        include_once __dir__ . "/../vista/php/get_clie.php";
    }
    public function getuser() {
        include_once __dir__ . "/../vista/php/get_user.php";
    }
    public function getdatosventa() {
        include_once __dir__ . "/../vista/php/getdatosventa.php";
    }

    

    

}
