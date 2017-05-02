<?php
namespace Contacto\Service\Factory;
 
use Contacto\Service\ContactoService;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class ContactoServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		return new ContactoService(
			$serviceLocator->get('Contacto\Mapper\ContactoMapperInterface')
		);
	}
}