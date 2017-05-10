<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Portada\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Trabajo\Service\Interfaces\TrabajoServiceInterface;

class IndexController extends AbstractActionController {
	
	protected $trabajoService;
	
	public function __construct(
		TrabajoServiceInterface $trabajoService
		) {
		
		$this->trabajoService = $trabajoService;
		
	}
	
    public function indexAction() {
				
	$layout = $this->layout();
        $header = new ViewModel();
        $header->setTemplate('partial/header');
        $layout->addChild($header, 'header');
				
				$trabajos = $this->trabajoService->findAllTrabajos(3);
				$destacado = $this->trabajoService->destacado();
				
        return new ViewModel(array(
					'trabajos' => $trabajos,
					'trabajo_destacado' => $destacado
				));
    }
}
