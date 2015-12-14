<?php

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/interfaces/NabuControlador.php';

class Rest extends REST_Controller implements NabuControlador {

    public function __construct() {
        parent::__construct();
        $this->load->model("modelo");
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    }

    public function index_get($llave) {
        //Validamos la llave


        if (!$this->get('id')) {
            $tasks = $this->modelo->busqueda_all(); // return all record		
        } else {
            $tasks = $this->modelo->busqueda($this->get('id')); // return all record		
        }

        if ($tasks) {
            $this->response($tasks, 200); // return success code if record exist
        } else {
            $this->response([], 404); // return empty
        }
    }

    public function index_delete($llave) {
        
    }

    public function index_post($llave) {
        
    }

    public function index_put($llave) {
        
    }

}
