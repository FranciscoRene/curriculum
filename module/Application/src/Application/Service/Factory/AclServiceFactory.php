<?php
namespace AdminAcl\Service\Factory;
 
use AdminAcl\Service\AclService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class AclServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new AclService(
			$serviceLocator->get('AdminAcl\Mapper\AclMapperInterface'),
			$serviceLocator->get('AdminAcl\Mapper\ReglaMapperInterface'),
			$serviceLocator->get('AdminAcl\Mapper\RolMapperInterface'),
			$serviceLocator->get('AdminAcl\Mapper\RecMapperInterface'),
			$serviceLocator->get('AdminAcl\Mapper\PrivilegioMapperInterface'),
			$serviceLocator->get('AdminAcl\Mapper\AfirmacionMapperInterface')
			
		);
	}
}