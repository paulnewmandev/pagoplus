<?php
class Musuario extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation','session');
		} 

	public function verificar($dato){
		$Query = $this->db->query("SELECT * FROM usuarios WHERE email='".$dato['txtEmail']."' AND clave=MD5('".$dato['txtClave']."') AND activo='1' LIMIT 1");
		$row = $Query->row();
		$userData = array( 
                'pp_id' 		   => $row->id,
				'pp_nombre' 	   => $row->nombre,
                'pp_apellido'     => $row->apellido,
                'pp_cedula'        => $row->ci,
				'pp_email' 		   => $row->email
		);
		$this->session->set_userdata($userData);
		if($Query->num_rows() > 0){
			return 'success';
		}else{
			return 'error';
		}

	}
	public function cambiaClave($dato){
		$idUsuario = $dato['txtIDUsuario'];
		$claveUsuario = $dato['txtClave'];
			$Query = $this->db->query("UPDATE usuarios SET clave = md5('".$claveUsuario."') WHERE id = '".$idUsuario."'");
		if ($Query){
			return 'success';
		}else{
			return 'error';
		}

		if ($this->db->affected_rows() > 0){
			return 'success';
		}else{
			return 'error';
		}
	}
}