<?php
namespace Trabajo\Controller\Trabajo\Factory;

use Trabajo\Controller\Trabajo\ListTrabajoController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListTrabajoControllerFactory implements FactoryInterface {
	 
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		$sl 	= $serviceLocator->getServiceLocator();

		return new ListTrabajoController(
			$sl->get('Trabajo\Service\TrabajoServiceInterface'),
			$sl->get('Portada\Service\AyudaService')
			);	
	}
	
}