<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('musuario');
    }

    public function index(){
        $this->load->view('inc/header');
        $this->load->view('login');
        $this->load->view('inc/footer');
    }
	public function verificar(){
		if($_POST){
			echo $this->musuario->verificar($_POST);
		}else{
			redirect(base_url());
		}
	}
	
}
