<?php
namespace Contacto\Mapper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface; 
use Zend\Stdlib\Hydrator\ClassMethods;
use Contacto\Mapper\ContactoMapper;
use Contacto\Model\Contacto as ContactoPrototype;

class ContactoFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) { 
	
		return new ContactoMapper(
			$serviceLocator->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new ContactoPrototype()
		);
	
	}
	
} 