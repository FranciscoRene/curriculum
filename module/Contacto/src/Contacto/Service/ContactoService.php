<?php
namespace Contacto\Service;

use Contacto\Service\Interfaces\ContactoServiceInterface;
use Contacto\Mapper\ContactoMapperInterface;
use Contacto\Model\ContactoInterface;

class ContactoService implements ContactoServiceInterface {
	
	private $contactoMapper;

	public function __construct(ContactoMapperInterface  $contactoMapper) {
		
		$this->contactoMapper = $contactoMapper;	
		
	}
	
	public function findAllContactos() {
		
		return $this->contactoMapper->findAll();
		
	}
	
	public function findContacto($id) {
		
		return $this->contactoMapper->find($id);
		
	}
	
	public function saveContacto(ContactoInterface $contacto) {
		
		return $this->contactoMapper->save($contacto);
		
	}
	
	public function deleteContacto(ContactoInterface $contacto) {
		
		return $this->contactoMapper->delete($contacto);
		
	}
	
}