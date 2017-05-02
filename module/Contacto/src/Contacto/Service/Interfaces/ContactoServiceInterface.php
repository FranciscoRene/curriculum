<?php
namespace Contacto\Service\Interfaces;

use Contacto\Model\ContactoInterface;

interface ContactoServiceInterface {
	
	 /**
		* Should return a set of all reces that we can iterate over. Single entries of the array are supposed to be
		* implementing \Contacto\Model\ContactoInterface
		*
		* @return array|ContactoInterface[]
		*/
	 public function findAllContactos();

	 /**
		* Should return a single rec
		*
		* @param  int $id Identifier of the Rec that should be returned
		* @return ContactoInterface
		*/
	 public function findContacto($id);

	 /**
		* Should save a given implementation of the ContactoInterface and return it. If it is an existing Rec the Rec
		* should be updated, if it's a new Rec it should be created.
		*
		* @param  ContactoInterface $rec
		* @return ContactoInterface
		*/
	 public function saveContacto(ContactoInterface $trabajo);

	 /**
		* Should delete a given implementation of the ContactoInterface and return true if the deletion has been
		* successful or false if not.
		*
		* @param  ContactoInterface $rec
		* @return bool
		*/
	 public function deleteContacto(ContactoInterface $trabajo); 
	
}