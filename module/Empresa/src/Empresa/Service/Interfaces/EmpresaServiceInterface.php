<?php
namespace Empresa\Service\Interfaces;

use Empresa\Model\EmpresaInterface;

interface EmpresaServiceInterface {
	
	 /**
		* Should return a set of all reces that we can iterate over. Single entries of the array are supposed to be
		* implementing \Empresa\Model\EmpresaInterface
		*
		* @return array|EmpresaInterface[]
		*/
	 public function findAllEmpresas();

	 /**
		* Should return a single rec
		*
		* @param  int $id Identifier of the Rec that should be returned
		* @return EmpresaInterface
		*/
	 public function findEmpresa($id);

	 /**
		* Should save a given implementation of the EmpresaInterface and return it. If it is an existing Rec the Rec
		* should be updated, if it's a new Rec it should be created.
		*
		* @param  EmpresaInterface $rec
		* @return EmpresaInterface
		*/
	 public function saveEmpresa(EmpresaInterface $trabajo);

	 /**
		* Should delete a given implementation of the EmpresaInterface and return true if the deletion has been
		* successful or false if not.
		*
		* @param  EmpresaInterface $rec
		* @return bool
		*/
	 public function deleteEmpresa(EmpresaInterface $trabajo); 
	
}