<?php
namespace Contacto\Mapper;

use Contacto\Model\ContactoInterface;

interface ContactoMapperInterface {

	public function findAll();
	
	public function find($id);
	
	/**
	 * @param ContactoInterface $trabajoObject
	 *
	 * @param ContactoInterface $trabajoObject
	 * @return ContactoInterface
	 * @throws \Exception
	 */	
	public function save(ContactoInterface $trabajoObject);
	
	/**
	 * @param ContactoInterface $trabajoObject
	 *
	 * @return bool
	 * @throws \Exception
	 */
	public function delete(ContactoInterface $trabajoObject);

}