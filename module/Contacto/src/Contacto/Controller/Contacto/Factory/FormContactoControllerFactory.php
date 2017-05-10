<?php
namespace Contacto\Controller\Contacto\Factory;

use Contacto\Controller\Contacto\FormContactoController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FormContactoControllerFactory implements FactoryInterface {
	 
	public function createService(ServiceLocatorInterface $serviceLocator) {

		$sl 	= $serviceLocator->getServiceLocator();
		$sl->get('Empresa\Service\EmpresaServiceInterface');
		
		return new FormContactoController(
			$sl->get('Contacto\Service\ContactoServiceInterface'),
			$sl->get('Portada\Service\AyudaService')
			);	
	}
	
}