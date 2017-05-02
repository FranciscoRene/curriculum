<?php
namespace Trabajo\Mapper;

use Trabajo\Model\TrabajoInterface;

interface TrabajoMapperInterface {

	public function findAll($limit = null);
	
	public function find($id);
	
	public function destacado();
	
	/**
	 * @param TrabajoInterface $trabajoObject
	 *
	 * @param TrabajoInterface $trabajoObject
	 * @return TrabajoInterface
	 * @throws \Exception
	 */	
	public function save(TrabajoInterface $trabajoObject);
	
	/**
	 * @param TrabajoInterface $trabajoObject
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function delete(TrabajoInterface $trabajoObject);

}