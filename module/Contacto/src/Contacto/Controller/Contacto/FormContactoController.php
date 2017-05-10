<?php
namespace Contacto\Controller\Contacto;

use Contacto\Service\Interfaces\ContactoServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portada\Service\Interfaces\AyudaServiceInterface;

class FormContactoController extends AbstractActionController {
	
	//protected $eventIdentifier = 'Contacto\Controller\ListController';
	/**
	 * @var \Contacto\Service\Interface\ContactoServiceInterface
	 */
	protected $trabajoService;
	protected $ayudaService;
	
	public function __construct(
		ContactoServiceInterface $trabajoService,
		AyudaServiceInterface $ayudaService		
		) {
		
		$this->trabajoService = $trabajoService;
		$this->ayudaService = $ayudaService;
		
	}
	
	public function indexAction() {
		
		return new ViewModel(array(
			'trabajos' => $this->trabajoService->findAllContactos(),
			'ayudaService' => $this->ayudaService
    ));
	
	}	
	
	public function detalleAction() {
		
		$id = $this->params()->fromRoute('id');
		
		try {
			 $trabajo = $this->trabajoService->findContacto($id);
		} catch (\InvalidArgumentException $ex) {
			 return $this->redirect()->toRoute('home');
		}
		
		return new ViewModel(array(
			'trabajo' => $trabajo
		));
	
	}
	
}