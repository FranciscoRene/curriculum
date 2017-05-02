<?php
namespace Empresa\Service\Factory;
 
use Empresa\Service\EmpresaService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class EmpresaServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new EmpresaService(
			$serviceLocator->get('Empresa\Mapper\EmpresaMapperInterface')
		);
	}
}