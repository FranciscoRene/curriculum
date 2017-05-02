<?php
namespace Trabajo\Service\Interfaces;

use Trabajo\Model\TrabajoInterface;

interface TrabajoServiceInterface {
	
	 /**
		* Should return a set of all reces that we can iterate over. Single entries of the array are supposed to be
		* implementing \Trabajo\Model\TrabajoInterface
		*
		* @return array|TrabajoInterface[]
		*/
	 public function findAllTrabajos($limit = null);

	 /**
		* Should return a single rec
		*
		* @param  int $id Identifier of the Rec that should be returned
		* @return TrabajoInterface
		*/
	 public function findTrabajo($id);

	 /**
		* Should save a given implementation of the TrabajoInterface and return it. If it is an existing Rec the Rec
		* should be updated, if it's a new Rec it should be created.
		*
		* @param  TrabajoInterface $rec
		* @return TrabajoInterface
		*/
	 public function saveTrabajo(TrabajoInterface $trabajo);

	 /**
		* Should delete a given implementation of the TrabajoInterface and return true if the deletion has been
		* successful or false if not.
		*
		* @param  TrabajoInterface $rec
		* @return bool
		*/
	 public function deleteTrabajo(TrabajoInterface $trabajo); 
	
}