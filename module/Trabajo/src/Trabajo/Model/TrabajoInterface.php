<?php
namespace Trabajo\Model;

interface TrabajoInterface {
	
	public function getTr_codigo();
	
	public function setTr_codigo($tr_codigo);		
	
	public function getTr_titulo();
	
	public function setTr_titulo($tr_titulo);		
	
	public function getTr_subtitulo();
	
	public function setTr_subtitulo($tr_subtitulo);		
	
	public function getTr_sumario();
	
	public function setTr_sumario($tr_sumario);			
	
	public function getTr_resumen();
	
	public function setTr_resumen($tr_resumen);		
	
	public function getTr_cuerpo();
	
	public function setTr_cuerpo($tr_cuerpo);			
	
	public function getTr_fecha();
	
	public function setTr_fecha($tr_fecha);		
	
	public function getTr_imagen_perfil();
	
	public function setTr_imagen_perfil($tr_imagen_perfil);		
	
	public function getImagenes();
	
	public function setImagenes($fotosObj);	
	
}