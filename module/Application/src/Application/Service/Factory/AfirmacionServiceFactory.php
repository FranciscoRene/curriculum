<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\AfirmacionService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class AfirmacionServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new AfirmacionService(
			$serviceLocator->get('AdminAcl\Mapper\AfirmacionMapperInterface')
		);
	}
}