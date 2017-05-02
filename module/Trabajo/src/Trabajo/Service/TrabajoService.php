<?php
namespace Trabajo\Service;

use Trabajo\Service\Interfaces\TrabajoServiceInterface;
use Trabajo\Mapper\TrabajoMapperInterface;
use Trabajo\Model\TrabajoInterface;

class TrabajoService implements TrabajoServiceInterface {
	
	private $trabajoMapper;

	public function __construct(TrabajoMapperInterface  $trabajoMapper) {
		
		$this->trabajoMapper = $trabajoMapper;	
		
	}
	
	public function findAllTrabajos($limit = null) {
		
		return $this->trabajoMapper->findAll($limit);
		
	}
	
	public function findTrabajo($id) {
		
		return $this->trabajoMapper->find($id);
		
	}	
	
	public function destacado() {
		
		return $this->trabajoMapper->destacado();
		
	}
	
	public function saveTrabajo(TrabajoInterface $trabajo) {
		
		return $this->trabajoMapper->save($trabajo);
		
	}
	
	public function deleteTrabajo(TrabajoInterface $trabajo) {
		
		return $this->trabajoMapper->delete($trabajo);
		
	}
	
}