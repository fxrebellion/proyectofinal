<?php

class voto extends DBAbstractModel {
	public $id_votacion;
    public $id_usuario;
    public $id_chollo;
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
	
	public function get_todos() {
		$this->query = "
		SELECT id,descripcion,nvotos,imagen,id_usuario,caracteristicas
		FROM chollos;";
		$this->get_results_from_query(); 
		
		//en el atributo rows del DBAbstractModel están todos los datos.
		// como es protected no se pueden leer desde el progama principal, por eso implementamos el get_productos()
		//tambien se podría hacer con un return de $this->rows aqui;
		
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
	public function actualiza_tabla_votaciones($id='',$id_usuario=''){
		if($id != ''):
		$this->query = "insert into votaciones(id_votacion,id_usuario,id_chollo) values ('','$id_usuario','$id')";
        $this->execute_single_query();
    endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;

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