<?php
namespace Contacto\Model;

interface ContactoInterface {
	
	public function getCon_codigo();
	
	public function setCon_codigo($con_codigo);		
	
	public function getCon_nombre();
	
	public function setCon_nombre($con_nombre);		
	
	public function getCon_telefono();
	
	public function setCon_telefono($con_telefono);			
	
	public function getCon_email();
	
	public function setCon_email($con_email);		

	public function getCon_fecha();
	
	public function setCon_fecha($con_fecha);	
	
	public function getCon_hora();
	
	public function setCon_hora($con_hora);	
	
	public function getCon_mensaje();
	
	public function setCon_mensaje($con_mensaje);		
	
	public function getCon_estado();
	
	public function setCon_estado($con_estado);		
	
}