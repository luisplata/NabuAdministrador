<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Luiis Plata
 */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/interfaces/NabuControlador.php';

class Login extends REST_Controller implements NabuControlador {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library("validaciones");
        $this->load->model("usuarios", "usuarios");
    }

    public function index_delete() {
        
    }

    public function index_get() {
        $llave = $this->get("llave");
        $llaves = $this->validaciones->validarLlave($llave);
        //print_r($llaves);
        if ($llaves) {
            //hay llave
            //y no se hace el login
            $this->response($llaves, 200);
        } else {
            //si no tiene llave se hace el login
            $usuario = $this->get("user");
            $pass = $this->get("pass");
//            print_r($usuario.$pass);
            $resutado = $this->usuarios->login($usuario, sha1($pass));
//            print_r($resutado);
            if ($resutado) {
                $this->response($resutado, 200);
            } else {
                $this->response([], 404);
            }
//            if ($resutado != FALSE) {
//                //tiene llave
//                $this->response($resutado, 200);
//            } else {
//
//            }
        }
    }

    public function index_post() {
        
    }

    public function index_put() {
        
    }

}
