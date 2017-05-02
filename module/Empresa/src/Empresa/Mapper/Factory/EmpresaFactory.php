<?php
namespace Empresa\Mapper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface; 
use Zend\Stdlib\Hydrator\ClassMethods;
use Empresa\Mapper\EmpresaMapper;
use Empresa\Model\Empresa as EmpresaPrototype;

class EmpresaFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) { 
	
		return new EmpresaMapper(
			$serviceLocator->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new EmpresaPrototype()
		);
	
	}
	
} 