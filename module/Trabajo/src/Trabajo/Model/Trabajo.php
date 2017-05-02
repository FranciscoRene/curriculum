<?php
namespace Trabajo\Model;

class Trabajo implements TrabajoInterface {
	
	protected $tr_codigo='';
	protected $tr_titulo;
	protected $tr_subtitulo;
	protected $tr_sumario;
	protected $tr_resumen;
	protected $tr_cuerpo;
	protected $tr_fecha;
	protected $tr_imagen_perfil;
	protected $imagenesObj;
	
	public function getTr_codigo() {
		
		return $this->tr_codigo;
		
	}
	
	public function setTr_codigo($tr_codigo) {
		
		$this->tr_codigo = $tr_codigo;
		
	}

	public function getTr_titulo() {
		
		return $this->tr_titulo;
		
	}
	
	public function setTr_titulo($tr_titulo) {
		
		$this->tr_titulo = $tr_titulo;
		
	}		
	
	public function getTr_subtitulo() {
		
		return $this->tr_subtitulo;
		
	}
	
	public function setTr_subtitulo($tr_subtitulo) {
		
		$this->tr_subtitulo = $tr_subtitulo;
		
	}	
	
	public function getTr_sumario() {
		
		return $this->tr_sumario;
		
	}
	
	public function setTr_sumario($tr_sumario) {
		
		$this->tr_sumario = $tr_sumario;
		
	}		
	
	public function getTr_resumen() {
		
		return $this->tr_resumen;
		
	}
	
	public function setTr_resumen($tr_resumen) {
		
		$this->tr_resumen = $tr_resumen;
		
	}	
	
	public function getTr_cuerpo() {
		
		return $this->tr_cuerpo;
		
	}
	
	public function setTr_cuerpo($tr_cuerpo) {
		
		$this->tr_cuerpo = $tr_cuerpo;
		
	}	
	
	public function getTr_fecha() {
		
		return $this->tr_fecha;
		
	}
	
	public function setTr_fecha($tr_fecha) {
		
		$this->tr_fecha = $tr_fecha;
		
	}	
	
	public function getTr_imagen_perfil() {
		
		return $this->tr_imagen_perfil;
		
	}
	
	public function setTr_imagen_perfil($tr_imagen_perfil) {
		
		$this->tr_imagen_perfil = $tr_imagen_perfil;
		
	}
	
	public function getImagenes() {
		
		return $this->imagenesObj;
		
	}		
	
	public function setImagenes($imagenesObj) {
		
		$this->imagenesObj = $imagenesObj;
		
	}
	
}