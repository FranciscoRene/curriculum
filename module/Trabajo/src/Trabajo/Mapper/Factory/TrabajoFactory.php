<?php
namespace Trabajo\Mapper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface; 
use Zend\Stdlib\Hydrator\ClassMethods;
use Trabajo\Mapper\TrabajoMapper;
use Trabajo\Model\Trabajo as TrabajoPrototype;

class TrabajoFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) { 
	
		return new TrabajoMapper(
			$serviceLocator->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new TrabajoPrototype(),
			$serviceLocator->get('Trabajo\Mapper\TrabajoFotosMapperInterface')
		);
	
	}
	
} 