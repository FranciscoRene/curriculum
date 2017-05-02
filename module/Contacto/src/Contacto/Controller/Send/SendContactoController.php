<?php
namespace Contacto\Controller\Send;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Application\Service\Interfaces\AyudaServiceInterface;
use Contacto\Service\Interfaces\ContactoServiceInterface;
use Contacto\Model\Contacto;

class SendContactoController extends AbstractActionController {
	
	protected $contactoForm;
	protected $contactoFilter;
	protected $contactoService;
	
	public function __construct (
		$contactoForm, 
		$contactoFilter,
		ContactoServiceInterface $contactoService		
		) {
		
		$this->contactoForm = $contactoForm;
		$this->contactoFilter = $contactoFilter;
		$this->contactoService = $contactoService;
		
	}
	
	public function sendAction() {
		
		$request = $this->getRequest();
		
		$this->contactoForm->setInputFilter($this->contactoFilter);
		
		$data = $request->getPost();

		$this->contactoForm->setData($data);
		$messages = "valido";
		
		// Validate the form
		if ($this->contactoForm->isValid()) {
				$objContacto = new Contacto();
				$objContacto->exchangeArray($this->contactoForm->getData());
				$this->contactoService->saveContacto($objContacto);
		} else {
				$messages = $this->contactoForm->getInputFilter()->getMessages();
		}
		// print_r($messages);die();

		return new JsonModel(json_decode($messages));
	
	}	
	
}