<?php
namespace Trabajo\Model;

class TrabajoFotos implements TrabajoFotosInterface {
	
	protected $tri_codigo='';
	protected $tr_codigo='';
	protected $tri_imagen_grande;
	protected $tri_imagen_galeria;
	protected $tri_titulo;
	
	public function getTri_codigo() {
		
		return $this->tri_codigo;
		
	}
	
	public function setTri_codigo($tri_codigo) {
		
		$this->tri_codigo = $tri_codigo;
		
	}	
	
	public function getTr_codigo() {
		
		return $this->tr_codigo;
		
	}
	
	public function setTr_codigo($tr_codigo) {
		
		$this->tr_codigo = $tr_codigo;
		
	}

	public function getTri_imagen_grande() {
		
		return $this->tri_imagen_grande;
		
	}
	
	public function setTri_imagen_grande($tri_imagen_grande) {
		
		$this->tri_imagen_grande = $tri_imagen_grande;
		
	}		
	
	public function getTri_imagen_galeria() {
		
		return $this->tri_imagen_galeria;
		
	}
	
	public function setTri_imagen_galeria($tri_imagen_galeria) {
		
		$this->tri_imagen_galeria = $tri_imagen_galeria;
		
	}	
	
	public function getTri_titulo() {
		
		return $this->tri_titulo;
		
	}
	
	public function setTri_titulo($tri_titulo) {
		
		$this->tri_titulo = $tri_titulo;
		
	}
	
}