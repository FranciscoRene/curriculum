<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\RolService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class RolServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new RolService(
			$serviceLocator->get('AdminAcl\Mapper\RolMapperInterface')
		);
	}
}