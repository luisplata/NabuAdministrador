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
class Usuarios extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(TRUE);
    }

    public function principalId($llave) {
        //$resultado = $this->db->query("CALL llave ('{$llave}')");
        $resultado = $this->db->query("select llave from usuarios where llave like '$llave'");
        //print_r($resultado);
        if ($resultado->num_rows() > 0) {
            //hay datos
            foreach ($resultado->result() as $value) {
                return $value->llave;
            }
        } else {
            return FALSE;
        }
    }

    public function login($usuario, $pass) {
        //$resultado = $this->db->query("call login ('$usuario','$pass')");   
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
                return $fila->llave;
            }
        } else {
            //no tiene login
            return FALSE;
        }
    }

}
