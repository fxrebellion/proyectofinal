<?php

class usuario extends DBAbstractModel {
	public $id;
	public $nombre;
	public $correo;
	public $contrasenya;
	public $tipo;
	public $imagen;
	function __construct() {
		$this->db_name = 'proyectofinal';
	}
	
	public function get_usuario(){
		return $this->rows;
	}
	public function set_usuario($datos=array()){

		foreach ($datos as $campo => $valor) {
			$$campo = $valor;
		}

		$this->query = "
		INSERT INTO usuarios(id,nombre,correo,contrasenya,tipo,imagen) VALUES('','$nombre','$correo','$contrasenya','usuario', '$imagen')";
		$this->execute_single_query();
	}
	public function get($id='') {
	}

	public function perfil($correo=''){
	
 $this->query = "
SELECT id, nombre,correo,contrasenya, tipo, imagen
from usuarios
where correo = '$correo';
 ";
 $this->get_results_from_query();


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
		foreach ($datos as $campo => $valor) {
			$$campo = $valor;
		}

		$this->query = "
		INSERT INTO chollos(id,descripcion,nvotos,imagen,id_usuario,caracteristicas) VALUES('','$descripcion', '0' ,'$imagen','$id', '$caracteristicas')";
		$this->execute_single_query();


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
?>