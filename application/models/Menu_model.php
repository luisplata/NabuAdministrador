<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu_model
 *
 * @author Luiis Plata
 */
class Menu_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getMenus($id) {
        /* traera la id del usuario
         * buscara los menus que tengan el perfil del usuario
         * retornara un array con los datos para el menu
         */
        $this->db->trans_begin();
        $obteniendoTodo = "select "
                . "m.nombre, url, p.nombre as perfil_nombre "
                . "from menu_perfiles mp "
                . "inner join perfiles p on p.id = mp.perfiles_id "
                . "inner join menu m on mp.menu_id = m.id "
                . "inner join usuarios u on u.perfiles_id = p.id "
                . "where u.id = " . $id;


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return array();
        } else {
            $this->db->trans_commit();
            return $resultado->result();
        }
    }

}
