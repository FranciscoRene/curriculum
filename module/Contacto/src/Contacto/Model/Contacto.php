<?php
namespace Contacto\Model;

class Contacto implements ContactoInterface {
	
	protected $con_codigo='';
	protected $con_nombre;
	protected $con_telefono;
	protected $con_email;
	protected $con_fecha;
	protected $con_hora;
	protected $con_mensaje;
	protected $con_estado;
	
	public function getCon_codigo() {
		
		return $this->con_codigo;
		
	}
	
	public function setCon_codigo($con_codigo) {
		
		$this->con_codigo = $con_codigo;
		
	}

	public function getCon_nombre() {
		
		return $this->con_nombre;
		
	}
	
	public function setCon_nombre($con_nombre) {
		
		$this->con_nombre = $con_nombre;
		
	}	
	
	public function getCon_telefono() {
		
		return $this->con_telefono;
		
	}
	
	public function setCon_telefono($con_telefono) {
		
		$this->con_telefono = $con_telefono;
		
	}	
	
	public function getCon_email() {
		
		return $this->con_email;
		
	}
	
	public function setCon_email($con_email) {
		
		$this->con_email = $con_email;
		
	}
	
	public function getCon_fecha() {
		
		return $this->con_fecha;
		
	}
	
	public function setCon_fecha($con_fecha) {
		
		$this->con_fecha = $con_fecha;
		
	}		
	
	public function getCon_hora() {
		
		return $this->con_hora;
		
	}
	
	public function setCon_hora($con_hora) {
		
		$this->con_hora = $con_hora;
		
	}		
	
	public function getCon_mensaje() {
		
		return $this->con_mensaje;
		
	}
	
	public function setCon_mensaje($con_mensaje) {
		
		$this->con_mensaje = $con_mensaje;
		
	}

	public function getCon_estado() {
		
		return $this->con_estado;
		
	}
	
	public function setCon_estado($con_estado) {
		
		$this->con_estado = $con_estado;
		
	}

	public function exchangeArray($data) {
		
		date_default_timezone_set('America/Santiago');
		$this->con_codigo			= (!empty($data['con_codigo'])) ? $data['con_codigo'] : null;
		$this->con_nombre			= (!empty($data['con_nombre'])) ? $data['con_nombre'] : null;
		$this->con_telefono 	= (!empty($data['con_telefono'])) ? $data['con_telefono'] : null;
		$this->con_email 			= (!empty($data['con_email'])) ? $data['con_email'] : null; 
		$this->con_fecha 			= (!empty($data['con_fecha'])) ? $data['con_fecha'] : date('Y-m-d H:i:s');
		$this->con_hora 			= (!empty($data['con_hora'])) ? $data['con_hora'] : date("H:i:s");  
		$this->con_mensaje 		= (!empty($data['con_mensaje'])) ? $data['con_mensaje'] : null; 
		$this->con_estado 		= (isset($data['active'])) ? $data['active'] : 0;
		
	}	
	
}