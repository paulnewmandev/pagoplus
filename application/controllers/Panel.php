<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
		$this->load->library('form_validation','session');
		$this->load->model('musuario');
    
    } 
    public function index(){ 
        if ($this->session->has_userdata('pp_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/index');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function perfil(){ 
        if ($this->session->has_userdata('pp_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/perfil');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function cambiaClave(){
		if($_POST){
			echo $this->musuario->cambiaClave($_POST);
		}else{
			redirect(base_url());
		}
    }
    public function cambiarClave(){
        if ($this->session->has_userdata('pp_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/cambiarClave');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function salir(){
        session_destroy();
        $array_items = array(
                                'pp_id',
                                'pp_nombre' , 
                                'pp_apellido' ,
                                'pp_cedula',
                                'pp_email'
                            );
		$this->session->unset_userdata($array_items);
		redirect(site_url());
	}
}
