<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\RecService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class RecServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new RecService(
			$serviceLocator->get('AdminAcl\Mapper\RecMapperInterface')
		);
	}
}