<?php
namespace Empresa\Mapper;

use Empresa\Model\EmpresaInterface;

interface EmpresaMapperInterface {

	public function findAll();
	
	public function find($id);
	
	/**
	 * @param EmpresaInterface $trabajoObject
	 *
	 * @param EmpresaInterface $trabajoObject
	 * @return EmpresaInterface
	 * @throws \Exception
	 */	
	public function save(EmpresaInterface $trabajoObject);
	
	/**
	 * @param EmpresaInterface $trabajoObject
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function delete(EmpresaInterface $trabajoObject);

}