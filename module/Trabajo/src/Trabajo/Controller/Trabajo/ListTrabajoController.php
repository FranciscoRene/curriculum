<?php
namespace Trabajo\Controller\Trabajo;

use Trabajo\Service\Interfaces\TrabajoServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\Interfaces\AyudaServiceInterface;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

class ListTrabajoController extends AbstractActionController {
	
	//protected $eventIdentifier = 'Trabajo\Controller\ListController';
	/**
	 * @var \Trabajo\Service\Interface\TrabajoServiceInterface
	 */
	protected $trabajoService;
	protected $ayudaService;
	
	public function __construct(
		TrabajoServiceInterface $trabajoService,
		AyudaServiceInterface $ayudaService		
		) {
		
		$this->trabajoService = $trabajoService;
		$this->ayudaService = $ayudaService;
		
	}
	
	public function indexAction() {
		//Obtencion lista de trabajos
		$trabajos = $this->trabajoService->findAllTrabajos();
		
		//Página actual para Paginator		
		$page = (int) $this->params()->fromQuery('page', 1);
		
		//Paginator
		$paginator = new Paginator(new paginatorIterator($trabajos));
		$paginator->setCurrentPageNumber($page)
						->setItemCountPerPage(4)
						->setPageRange(5);
						
		return new ViewModel(array(
			'trabajos' => $paginator,
			'ayudaService' => $this->ayudaService
    ));
	
	}	
	
	public function detalleAction() {
		
		$id = $this->params()->fromRoute('id');
		
		try {
			 $trabajo = $this->trabajoService->findTrabajo($id);
		} catch (\InvalidArgumentException $ex) {
			 return $this->redirect()->toRoute('home');
		}
		
		return new ViewModel(array(
			'trabajo' => $trabajo,
			'ayudaService' => $this->ayudaService
		));
	
	}
	
}