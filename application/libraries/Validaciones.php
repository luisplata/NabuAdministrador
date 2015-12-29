<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validaciones
 *
 * @author Luiis Plata
 */
class Validaciones {
    /* Libreria que permitira hacer validaciones con la base de datos para ver si puede o no acceder */

    private $CI = null;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model("Usuarios_model", "usuario");
    }

    public function validarLlave($llave) {
        $resultado = $this->CI->usuario->principalId($llave);
        if ($resultado) {
            return $resultado;
        } else {
            return FALSE;
        }
    }

}
