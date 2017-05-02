<?php
namespace Contacto\Controller\Send\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Contacto\Controller\Send\SendContactoController;
use Contacto\Form\ContactoForm;
use Contacto\Form\ContactoFilter;

class SendContactoControllerFactory implements FactoryInterface {
	 
	public function createService(ServiceLocatorInterface $serviceLocator) {

		$sl 	= $serviceLocator->getServiceLocator();		
		$contactoForm = new ContactoForm();
		$contactoFilter = new ContactoFilter();
		$contactoService = $sl->get('Contacto\Service\ContactoServiceInterface');

		return new SendContactoController(
			$contactoForm, 
			$contactoFilter,
			$contactoService
		);	
	}
	
}