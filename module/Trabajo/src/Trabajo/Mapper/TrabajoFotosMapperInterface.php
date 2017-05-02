<?php
namespace Trabajo\Mapper;

use Trabajo\Model\TrabajoFotosInterface;

interface TrabajoFotosMapperInterface {

	public function findAll();
	
	public function find($id);
	
	public function findByTrabajo($id);
	
	public function findAllByCodigo($codigo);

}