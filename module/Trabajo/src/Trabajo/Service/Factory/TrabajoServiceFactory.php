<?php
namespace Trabajo\Service\Factory;
 
use Trabajo\Service\TrabajoService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class TrabajoServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new TrabajoService(
			$serviceLocator->get('Trabajo\Mapper\TrabajoMapperInterface')
		);
	}
}