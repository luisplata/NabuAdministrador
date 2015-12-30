<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author Luiis Plata
 */
class Menu extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function get() {
        //Opteniendo menus
        /* Traera la llave
         * buscara el id del usuario
         * traera los menu perfiles con sus url
         */
        if($this->validaciones->validarLlave($this->input->get("llave"))){
            //hay llave
            
        }else{
            //no hay llave
        }
    }
    
}
