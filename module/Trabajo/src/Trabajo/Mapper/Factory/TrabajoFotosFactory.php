<?php
namespace Trabajo\Mapper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface; 
use Zend\Stdlib\Hydrator\ClassMethods;
use Trabajo\Mapper\TrabajoFotosMapper;
use Trabajo\Model\TrabajoFotos as TrabajoFotosPrototype;

class TrabajoFotosFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) { 		
		
		return new TrabajoFotosMapper(
			$serviceLocator->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new TrabajoFotosPrototype()
		);
	
	}
	
} 