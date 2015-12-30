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
class Login extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model("usuarios_model", "usuarios");
        header('Access-Control-Allow-Origin: *');
    }

    public function index_delete() {
        
    }

    public function get2() {
        $this->output->set_status_header('401', "Prueba, asi que note asustes ;)");
        echo json_encode($this->input->get("llave"));
    }

    public function get() {
        $llave = $this->input->get("llave");
        $llaves = $this->validaciones->validarLlave($llave);
        //print_r($llaves);
        if ($llaves) {
            //hay llave
            //y no se hace el login            
            $this->output->set_status_header('200');
            //colocarlo en un array?
            echo json_encode($llaves);
            //return;
        } else {
            //si no tiene llave se hace el login
            $usuario = $this->input->get("user");
            $pass = $this->input->get("pass");
//            print_r($usuario.$pass);
            $resutado = $this->usuarios->login($usuario, sha1($pass));
//            print_r($resutado);
            if ($resutado) {
                //$this->response($resutado, 200);
                $this->output->set_status_header('200');
                echo json_encode($resutado);
                //return;
            } else {
                //$this->response([], 404);
                $this->output->set_status_header('404', "No Hay nada para ti :(");
                //return;
            }
        }
        return;
    }

    public function post() {
        
    }

    public function put() {
        
    }

}
