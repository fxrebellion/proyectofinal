<?php
include('db_abstract_model.php');
class chollo extends DBAbstractModel {
	public $id;
	public $descripcion;
	public $nvotos;
	public $imagen;
	public $id_usuario;
	public $caracteristicas;
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

	public function get_paginado($indice=''){
		
		$this->query = "
		SELECT * FROM chollos ORDER BY id DESC LIMIT ".($indice * 8).", 8";
		$this->get_results_from_query(); 





	}
	
	public function get_rows(){
		return $this->rows;
	}
	
	public function set($datos=array()) {
		foreach ($datos as $campo => $valor) {
			$$campo = $valor;
		}

		$this->query = "
		INSERT INTO chollos(id,descripcion,nvotos,imagen,id_usuario,caracteristicas) VALUES('','$descripcion', '0' ,'$imagen','$id', '$caracteristicas')";
		$this->execute_single_query();


	}
	public function votar($id=''){
   $this->query = "update chollos set nvotos = nvotos + 1 where id='$id';";
   $this->execute_single_query();


	}

	public function actualiza_tabla_votaciones($id='',$id_usuario=''){
		
		$this->query = "insert into votaciones(id_votacion,id_usuario,id_chollo) values ('','$id_usuario','$id')";
		$this->execute_single_query();
	

	}
	public function usuariocreador($id=''){
		if($id != ''):
		$this->query = "select usuarios.nombre from usuarios, chollos where chollos.id_usuario = usuarios.id and chollos.id_usuario='$id'";
		$this->get_results_from_query();
	endif;
	if(count($this->rows) == 1):
		foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
		endforeach;
	endif;

	}
	public function edit($prod_data=array()) {
		$this->execute_single_query();
		}
		public function barrabuscar($descripcion = ''){
			$this->query = "select * from chollos where descripcion like '%".$descripcion."%'";
			$this->get_results_from_query();
		}
	public function delete($id='') {
		$this->query = "
		DELETE FROM chollos
		WHERE id = '$id'
		";
		$this->execute_single_query();
	}
	function __destruct() {
		//unset($this);
	}
}
