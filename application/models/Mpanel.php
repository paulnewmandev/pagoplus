<?php
class Mpanel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation','session');
    }

    function guardarRecarga($datos){
        $datos["usuario"] = $this->session->userdata("pp_id");
        $rs = $this->db->insert("recargas",$datos);
        if($rs) return "success";
        return "error";
    }

    function listaRecargas(){
        $rs = $this->db->query("SELECT *,recargas.id as idrecarga FROM recargas left join operadores on operadores.id = recargas.operador");
        $lista = $rs->result();
        foreach ($lista as $rec){
            $accion = '
            <div class="btn-group mt-40">
											<div class="dropdown show-on-hover">
												<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
												Acción </font></font><span class="caret"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
										
													<li><a href="#" onclick="modalEditar('.$rec->idrecarga.')"><font style="vertical-align: inherit;"><i class="ft-edit"></i> Editar</font></a></li>
													<li class="divider"></li>
													<li><a href="#" onclick="modalEliminar('.$rec->idrecarga.')"><font style="vertical-align: inherit;"><i class="ft-trash"></i> Eliminar</font></a></li>
												</ul>
											</div>
										</div>
            ';

            $datos[] = array("id"=>$rec->idrecarga,"nombre"=>$rec->nombre,"numero"=>$rec->numero,
                "monto"=>$rec->monto,"acciones"=>$accion);
        }
        return array("data"=>$datos);
    }




    function guardarPago($datos){
        $datos["usuario"] = $this->session->userdata("pp_id");
        $rs = $this->db->insert("pago_facturas",$datos);
        if($rs) return "success";
        return "error";
    }

    function listaPagos(){
        $rs = $this->db->query("SELECT * FROM pago_facturas");
        $lista = $rs->result();
        $datos = array();
        foreach ($lista as $rec){
            $accion = '
            <div class="btn-group mt-40">
											<div class="dropdown show-on-hover">
												<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
												Acción </font></font><span class="caret"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
										
													<li><a href="#" onclick="modalEditar('.$rec->id.')"><font style="vertical-align: inherit;"><i class="ft-edit"></i> Editar</font></a></li>
													<li class="divider"></li>
													<li><a href="#" onclick="modalEliminar('.$rec->id.')"><font style="vertical-align: inherit;"><i class="ft-trash"></i> Eliminar</font></a></li>
												</ul>
											</div>
										</div>
            ';

            $datos[] = array("id"=>$rec->id,"nombre"=>$rec->nombres,"cedula"=>$rec->cedula,
                "monto"=>$rec->monto,"acciones"=>$accion,"factura"=>$rec->n_factura);
        }
        return array("data"=>$datos);
    }


}