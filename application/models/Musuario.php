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
                'gs_id' 		   => $row->id,
                'gs_aseguradora'   => $row->id_aseguradora,
				'gs_rol' 		   => $row->rol,
				'gs_nombres' 	   => $row->nombres,
                'gs_apellidos'     => $row->apellidos,
                'gs_cedula'        => $row->cedula,
				'gs_email' 		   => $row->email
		);
		$this->session->set_userdata($userData);
		if($Query->num_rows() > 0){
			return 'success';
		}else{
			return 'error';
		}

	}
	public function cierreSin($dato){
		$idSin = $dato['txtIDSin'];
		$status = $dato['txtStatus'];
		if (!empty($_FILES['cesion']['name'])) {
			$prefijo = substr(md5(uniqid(rand())),0,4);
			$archivo = $_FILES['cesion']['name'];
			$archivo = str_replace(' ', '', $archivo);
			$destino = FCPATH . 'assets/archivos/' . $prefijo . '_' . $archivo;
			copy($_FILES['cesion']['tmp_name'], $destino);
			$archivoSiniestro = $prefijo . '_' . $archivo;
			$Archivos = $this->db->query("INSERT INTO arc_siniestro (id,id_siniestro,ruta) VALUES (NULL, '".$idSin."', '".$archivoSiniestro."')");
		}
		if (!empty($_FILES['firmas']['name'])) {
			$prefijo = substr(md5(uniqid(rand())),0,4);
			$archivo = $_FILES['firmas']['name'];
			$archivo = str_replace(' ', '', $archivo);
			$destino = FCPATH . 'assets/archivos/' . $prefijo . '_' . $archivo;
			copy($_FILES['firmas']['tmp_name'], $destino);
			$archivoSiniestro = $prefijo . '_' . $archivo;
			$Archivos = $this->db->query("INSERT INTO arc_siniestro (id,id_siniestro,ruta) VALUES (NULL, '".$idSin."', '".$archivoSiniestro."')");
		}
		$Query = $this->db->query("UPDATE siniestro SET status = '".$status."'  WHERE id = '".$idSin."'");
		if ($Query){
			return 'success';
		}else{
			return 'error';
		}
	}
	public function cambiaSiniestro($dato){
		$idSin = $dato['txtIDSin'];
		$status = $dato['txtStatus'];
		$valor = $dato['txtValor'];
		if(!empty($dato['txtObservacion'])){
			$observa = $dato['txtObservacion'];
		}else{
			$observa="";
		}	
		if (!empty($_FILES['arcCesion']['name'])) {
			$prefijo = substr(md5(uniqid(rand())),0,4);
			$archivo = $_FILES['arcCesion']['name'];
			$archivo = str_replace(' ', '', $archivo);
			$destino = FCPATH . 'assets/archivos/' . $prefijo . '_' . $archivo;
			copy($_FILES['arcCesion']['tmp_name'], $destino);
			$archivoSiniestro = $prefijo . '_' . $archivo;
			$Archivos = $this->db->query("INSERT INTO arc_siniestro (id,id_siniestro,ruta) VALUES (NULL, '".$idSin."', '".$archivoSiniestro."')");
		}

		if($observa==""){
			$Query = $this->db->query("UPDATE siniestro SET status = '".$status."',monto='".$valor."' WHERE id = '".$idSin."'");
		}else{
			$Query = $this->db->query("UPDATE siniestro SET status = '".$status."', observacion = '".$observa."' WHERE id = '".$idSin."'");
		}
		if ($Query){
			return 'success';
		}else{
			return 'error';
		}
	}
	public function enviaFirma($dato){
		$idSin = $dato['txtIDSin'];
		$status = $dato['txtStatus'];
		$Query = $this->db->query("UPDATE siniestro SET status = '".$status."' WHERE id = '".$idSin."'");
		if ($Query){
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
	}
	public function registraSiniestro($dato){
		$Query = $this->db->query("INSERT INTO siniestro (id,id_usuario,id_aseguradora,fecha,siniestro,tipo,provincia,direccion,telefono,email) VALUES (NULL,'".$dato['txtIDUsuario']."','".$dato['txtIDAseguradora']."',NOW(),'".$dato['txtSiniestro']."', '".$dato['cmbTipo']."','".$dato['cmbProvincia']."','".$dato['txtDireccion']."', '".$dato['txtTelefono']."', '".$dato['txtEmail']."')");
        $idSiniestro = $this->db->insert_id();
		$prefijo = substr(md5(uniqid(rand())),0,4);
		if(isset($_FILES)){
            foreach($_FILES as $nombre=>$arc) {
                if (!empty($_FILES[$nombre]['name'])) {
                    $archivo = $_FILES[$nombre]['name'];
                    $archivo = str_replace(' ', '', $archivo);
                    $destino = FCPATH . 'assets/archivos/' . $prefijo . '_' . $archivo;
                    copy($_FILES[$nombre]['tmp_name'], $destino);
                    $archivoSiniestro = $prefijo . '_' . $archivo;
					$Archivos = $this->db->query("INSERT INTO arc_siniestro (id,id_siniestro,ruta) VALUES (NULL, '".$idSiniestro."', '".$archivoSiniestro."')");
                }
            }
        }
		if ($this->db->affected_rows() > 0){
			return 'success';
		}else{
			return 'error';
		}
	}
}