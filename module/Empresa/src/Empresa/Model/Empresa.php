<?php
namespace Empresa\Model;

class Empresa implements EmpresaInterface {
	
	protected $em_codigo='';
	protected $em_nombre;
	protected $em_url;
	protected $em_telefono;
	protected $em_email;
	protected $em_email_copia;
	protected $em_facebook;
	protected $em_twitter;
	
	public function getEm_codigo() {
		
		return $this->em_codigo;
		
	}
	
	public function setEm_codigo($em_codigo) {
		
		$this->em_codigo = $em_codigo;
		
	}

	public function getEm_nombre() {
		
		return $this->em_nombre;
		
	}
	
	public function setEm_nombre($em_nombre) {
		
		$this->em_nombre = $em_nombre;
		
	}		
	
	public function getEm_url() {
		
		return $this->em_url;
		
	}
	
	public function setEm_url($em_url) {
		
		$this->em_url = $em_url;
		
	}	
	
	public function getEm_telefono() {
		
		return $this->em_telefono;
		
	}
	
	public function setEm_telefono($em_telefono) {
		
		$this->em_telefono = $em_telefono;
		
	}	
	
	public function getEm_email() {
		
		return $this->em_email;
		
	}
	
	public function setEm_email($em_email) {
		
		$this->em_email = $em_email;
		
	}	
	
	public function getEm_email_copia() {
		
		return $this->em_email_copia;
		
	}
	
	public function setEm_email_copia($em_email_copia) {
		
		$this->em_email_copia = $em_email_copia;
		
	}
	
	public function getEm_facebook() {
		
		return $this->em_facebook;
		
	}
	
	public function setEm_facebook($em_facebook) {
		
		$this->em_facebook = $em_facebook;
		
	}		
	
	public function getEm_twitter() {
		
		return $this->em_twitter;
		
	}
	
	public function setEm_twitter($em_twitter) {
		
		$this->em_twitter = $em_twitter;
		
	}		
	
}