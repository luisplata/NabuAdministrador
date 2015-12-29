<?php

class Modelo extends CI_Model{

	public function busqueda($nombre){
		$sql ="SELECT * FROM usuarios where user like '$nombre'";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows > 0){
			//Trajo
		}else{
			//no trajo
		}
		return $resultado->result();
	}
	public function busqueda_all(){
		$sql ="SELECT * FROM usuarios";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows > 0){
			//Trajo
		}else{
			//no trajo
		}
		return $resultado->result();
	}
}