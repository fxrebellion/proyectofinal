<?php

class comentario extends DBAbstractModel {
	public $id;
    public $texto;
    public $autor;
    public $fecha;
    public $id_usuario;
	public $id_chollo;
	public $imagen;
	function __construct() {
		$this->db_name = 'proyectofinal';
	}
	
	public function get_chollos(){
		return $this->rows;
	}
	public function get($id='') {
		if($id != ''):
			$this->query = "
			SELECT id,descripcion,nvotos,imagen,id_usuario,caracteristicas
			FROM chollos
			WHERE id = '$id';
			";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
			endforeach;
		endif;
	}

	public function perfil($id=''){
		if($id != ''):
 $this->query = "
 
SELECT id, nombre,correo, tipo, imagen_perfil
from usuarios
where id = '$id';
 ";
 $this->get_results_from_query();
endif;
if(count($this->rows) == 1):
	foreach ($this->rows[0] as $propiedad=>$valor):
		$this->$propiedad = $valor;
	endforeach;
endif;

	}
	
	public function get_todos($id='') {
		$this->query = "
		SELECT id,texto,autor,fecha,id_usuario,id_chollo,imagen
		FROM comentarios  where id_chollo = '$id' order by fecha desc;";
		$this->get_results_from_query(); 
		
	
		
	}
	public function get_comentario_paginado(){
		$this->query = "
		SELECT id,texto,autor,fecha,id_usuario,id_chollo,imagen
		FROM comentarios  where id_chollo = '$id' order by fecha desc DESC LIMIT ".($indice * 8).",8;";
		$this->get_results_from_query();





	}
	public function get_rows(){
		return $this->rows;
	}
	
	public function set($datos=array()) {
	


	}
	public function votar($id=''){
        if($id != ''):
   $this->query = "update chollos set nvotos = nvotos + 1 where id='$id';";
   $this->execute_single_query();
endif;
if(count($this->rows) == 1):
    foreach ($this->rows[0] as $propiedad=>$valor):
        $this->$propiedad = $valor;
    endforeach;
endif;

	}
public function comprobar_si_ha_votado($id_chollo='',$id_usuario=''){
    if($id_chollo != '' and $id_usuario!=''):
    $this->query = "select * from votaciones where id_chollo='$id_chollo' and id_usuario='$id_usuario';";
    $this->get_results_from_query();
endif;
    if(count($this->rows) == 1):
        foreach ($this->rows[0] as $propiedad=>$valor):
            $this->$propiedad = $valor;
        endforeach;
    endif;



}
	public function insertar_comentario($datos=array()){
		foreach ($datos as $campo => $valor) {
			$$campo = $valor;
		}

		$this->query = "insert into comentarios(id,texto,autor,fecha,id_usuario,id_chollo,imagen) values ('','$texto','$autor','$fecha','$id_usuario','$id_chollo','$imagen');";
        $this->execute_single_query();
    

	}
	public function usuariocreador($id=''){
	

	}
	public function edit($prod_data=array()) {
		$this->execute_single_query();
		}
	public function delete($cod_prod='') {
		$this->query = "
		DELETE FROM productos
		WHERE cod_prod = '$cod_prod'
		";
		$this->execute_single_query();
	}
	function __destruct() {
		//unset($this);
	}
}