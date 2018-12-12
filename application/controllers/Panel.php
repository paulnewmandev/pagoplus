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
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/index');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function perfil(){ 
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/perfil');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function nuevoSiniestro(){ 
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/nuevoSiniestro');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function registraSiniestro(){
		if($_POST){
			echo $this->musuario->registraSiniestro($_POST);
		}else{
			redirect(base_url());
		}
    }
    public function cierreSin(){
		if($_POST){
			echo $this->musuario->cierreSin($_POST);
		}else{
			redirect(base_url());
		}
    }
    public function cambiaSiniestro(){
		if($_POST){
			echo $this->musuario->cambiaSiniestro($_POST);
		}else{
			redirect(base_url());
		}
    }
    public function enviaFirma(){
		if($_POST){
			echo $this->musuario->enviaFirma($_POST);
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
    public function siniestro(){
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/siniestro');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function verSiniestros(){
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/verSiniestros');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public function cambiarClave(){
        if ($this->session->has_userdata('gs_email')) {
            $this->load->view('inc/header');
            $this->load->view('inc/menu');
            $this->load->view('panel/cambiarClave');
            $this->load->view('inc/footer');
        }else{
            redirect(base_url());
        }
    }
    public	function buscarSiniestros(){ 
		$json = array();
		$Query = $this->db->query("SELECT
                                        siniestro.id AS id,
                                        DATE_FORMAT(siniestro.fecha, '%d/%m/%Y') fecha, 
                                        siniestro.siniestro AS numero,
                                        siniestro.telefono AS telefono,
                                    CASE 
                                        siniestro.status 
                                    WHEN 0 THEN '<p class=text-warning>Enviado IMVEC</p>' 
                                    WHEN 1 THEN '<p class=text-info>Enviado Notaria</p>' 
                                    WHEN 2 THEN '<p class=pink>Rechazado</p>'
                                    WHEN 3 THEN '<p class=info>Reconocimiento de Firmas</p>'
                                    WHEN 4 THEN '<p class=success>Cerrado</p>'
                                    END AS status
                                    FROM
                                        siniestro,
                                        aseguradora
                                    WHERE
                                        siniestro.id_aseguradora = aseguradora.id");
		$json['data'] = $Query->result();
		
		echo json_encode($json);
    }
    public	function eliminaSiniestro(){
		$idSin =  $_POST['id'];
		$Query = $this->db->query("DELETE FROM siniestro WHERE id='".$idSin."'");
			echo 'success';
	}
    public function salir(){
        session_destroy();
        $array_items = array(
                                'gs_id',
                                'gs_aseguradora',
                                'gs_rol' ,
                                'gs_nombres' , 
                                'gs_apellidos' ,
                                'gs_cedula',
                                'gs_email'
                            );
		$this->session->unset_userdata($array_items);
		redirect(site_url());
	}
}
