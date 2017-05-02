<?php
namespace Empresa\Service;

use Empresa\Service\Interfaces\EmpresaServiceInterface;
use Empresa\Mapper\EmpresaMapperInterface;
use Empresa\Model\EmpresaInterface;

class EmpresaService implements EmpresaServiceInterface {
	
	private $empresaMapper;

	public function __construct(EmpresaMapperInterface  $empresaMapper) {
		
		$this->empresaMapper = $empresaMapper;	
		
	}
	
	public function findAllEmpresas() {
		
		return $this->empresaMapper->findAll();
		
	}
	
	public function findEmpresa($id) {
		
		return $this->empresaMapper->find($id);
		
	}
	
	public function saveEmpresa(EmpresaInterface $trabajo) {
		
		return $this->empresaMapper->save($trabajo);
		
	}
	
	public function deleteEmpresa(EmpresaInterface $trabajo) {
		
		return $this->empresaMapper->delete($trabajo);
		
	}
	
}