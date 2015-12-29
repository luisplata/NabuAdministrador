<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresas
 *
 * @author Luiis Plata
 */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/interfaces/NabuControlador.php';

class Empresas extends REST_Controller implements NabuControlador {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("empresas_model", "empresas");
    }

    public function index_delete() {
        
    }

    public function index_get() {
        /* Solo devuelve algo si muestran la llave correcta */
        if ($this->validaciones->validarllave($this->get("llave"))) {
            $this->response($this->empresas->getAll($this->get("llave")));
        } else {
            $this->response([], 404);
        }
    }

    public function index_post() {
        
    }

    public function index_put() {
        
    }

//put your code here
}
