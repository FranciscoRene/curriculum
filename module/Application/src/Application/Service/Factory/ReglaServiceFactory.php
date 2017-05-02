<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\ReglaService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class ReglaServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new ReglaService(
			$serviceLocator->get('AdminAcl\Mapper\ReglaMapperInterface')
		);
	}
}