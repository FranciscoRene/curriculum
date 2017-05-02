<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\PrivilegioService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class PrivilegioServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new PrivilegioService(
			$serviceLocator->get('AdminAcl\Mapper\PrivilegioMapperInterface')
		);
	}
}