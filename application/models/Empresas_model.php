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
class Empresas_model extends CI_Model {

    //put your code here
    public function getAll($llave) {
        $this->db->trans_begin();
        //obtenemos la id de la empresa principal para buscar las empresas que quiere buscar
        $sql = "select empresas_principales_id from usuarios where llave like '$llave'";
        $id = $this->db->query($sql);
        $id = $id->row();
        $sqlEmpresas = "select * from empresas where empresas_principales_id = $id->empresas_principales_id";
        $resultado = $this->db->query($sqlEmpresas);
        if ($resultado->num_rows() > 0) {
            //hay empresas que listar
            $filas = true;
        } else {
            //no hay retornamos un array vacio
            $filas = false;
        }
        if ($this->db->trans_status() === FALSE && !$filas) {
            $this->db->trans_rollback();
            return array();
        } else {
            $this->db->trans_commit();
            return $resultado->result();
        }
    }

}
