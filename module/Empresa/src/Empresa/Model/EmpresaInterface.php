<?php
namespace Empresa\Model;

interface EmpresaInterface {
	
	public function getEm_codigo();
	
	public function setEm_codigo($em_codigo);		
	
	public function getEm_nombre();
	
	public function setEm_nombre($em_nombre);			
	
	public function getEm_url();
	
	public function setEm_url($em_url);		
	
	public function getEm_telefono();
	
	public function setEm_telefono($em_telefono);			
	
	public function getEm_email();
	
	public function setEm_email($em_email);		
	
	public function getEm_email_copia();
	
	public function setEm_email_copia($em_email_copia);		

	public function getEm_facebook();
	
	public function setEm_facebook($em_facebook);	
	
	public function getEm_twitter();
	
	public function setEm_twitter($em_twitter);		
	
}