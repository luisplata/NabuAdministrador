<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($nombre)
	{
		$this->load->model("Modelo");
		$datos["negro"] = "Hola negro! :D";
		$datos["pery"]="hola pery";
		$datos["saludo"] = $this->Modelo->busqueda($nombre);
		$this->load->view('welcome_message',$datos);
	}
	public function ajax(){
		$this->load->model("Modelo");
		$nombre = $this->input->post("name");
		echo json_encode($this->Modelo->busqueda($nombre));
	}
}
