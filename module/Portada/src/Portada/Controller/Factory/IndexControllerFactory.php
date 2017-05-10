<?php
namespace Portada\Controller\Factory;

use Portada\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface {
	 
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		$sl 	= $serviceLocator->getServiceLocator();

		return new IndexController(
			$sl->get('Trabajo\Service\TrabajoServiceInterface')
			);	
	}
	
}