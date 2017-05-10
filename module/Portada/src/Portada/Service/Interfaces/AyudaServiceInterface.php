<?php
namespace Portada\Service\Interfaces;

interface AyudaServiceInterface {
	
	//STRING
	public function remove_accent($str);
	
	public function slug($str,$separador = '-');
	
	public function cortar_frase($text, $limit, $toggle=false);
	
	public function br2nl($string);
	
	public function mejora_comillas($val);
	
	public function ortografia($val);
	
	public function print_array($texto);
	
	public function formatear($val);
	
	//FECHAS
	public function mes_corto($fecha, $idioma, $abreviado=true);
	
	public function fecha_corta($fecha, $idioma, $abreviado=true);
	
	public function fecha_hora_ordenada($date, $idioma);
	
	public function fechaToCod($fecha);
	
	public function formatearFecha($fecha, $despliegue=false, $separador='-');
	
	public function fechas_periodo($fecha_ini, $fecha_fin);
	
	public function invierte_fecha($fecha,$separador = "-");
	
	public function fecha_real($fecha, $idioma='es',$separador=' de ');
	
	//HORAS
	
	public function extrae_hora($time, $campo='');
	
	//SQL
	
	public function Sqlinjection($val);
	
	//PRINT
	public function debug($data, $debug=false);
	
	public function echo_br($text, $die=false);
	
	public function mensaje($mensaje,$tipo);
	
	//NUMEROS
	
	public function toFormat($numero);
	
	public function num_format($value,$dec=false);
	
	public function formatearValor($valor, $despliegue = true);
	
	//ARCHIVOS
	
	public function crear_directorio($ruta,$ftp);
	
	public function mkdirSafeMode($dir,$ftp);
	
	public function url_file($url);
	
	public function delete_carpeta($dir,$ftp=false);
	
	public function delete_archivo($dir,$ftp);
	
	public function copy_file($file_server_name,$file_local_name,$ftp);
	
	public function size_file($peso , $decimales = 2 );
	
	public function delete_extension($name_file);
	
	public function name_file($file);
	
	public function extension($name_file);
	
	public function remote_file_size ($url);
	
	//SIN CLASIFICAR
	
	public function formatearRut($rut, $despleigue=false);
	
	public function TotalPaginas($Total, $numXpag);
	
	public function url_sin_pagina($url);
	
	public function crea_enlaces($text);
	
	public function closeColorbox();	
	
}