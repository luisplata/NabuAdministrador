<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarios
 *
 * @author Luiis Plata
 */
class Usuarios_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(TRUE);
    }

    public function principalId($llave) {
        $llaveResult = "";
        $this->db->trans_begin();
        $resultado = $this->db->query("select llave from usuarios where llave like '$llave'");
        if ($resultado->num_rows() > 0) {
            //hay datos
            $resultRow = $resultado->row();
            $llaveResult = $resultRow->llave;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            return $llaveResult;
        }




        //$resultado = $this->db->query("CALL llave ('{$llave}')");
        //print_r($resultado);
    }

    public function login($usuario, $pass) {
        $llave = "";
        $this->db->trans_begin();
        $sql = "select * from usuarios where user like '$usuario' and pass like '$pass'";
        $resultado = $this->db->query($sql);
        if ($resultado->num_rows() > 0) {
            //hay datos
            //cambiamos la llave del usuario            
            $value = $resultado->row();
            $updateLlave = "update usuarios set llave = sha1(now()+id+empresas_principales_id) where id = $value->id";
            if ($this->db->query($updateLlave)) {
                //llamamos de nuevo el selet para mandar la llave actualizada
                $query = $this->db->query($sql);
                $fila = $query->row();
                $llave = $fila->llave;
                $this->db->trans_commit();
                return $llave;
            }
        } else {
            //no tiene login
            $this->db->trans_rollback();
            return FALSE;
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return $llave;
        }
    }

}
