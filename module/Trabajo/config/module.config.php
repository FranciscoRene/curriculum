<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'trabajos' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/trabajos',
                    'defaults' => array(
                        'controller'    => 'Trabajo\Controller\ListTrabajo',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
									'trabajo-detalle' =>array(
										'type' => 'segment',
										'options' => array(
											'route' 	 => '/detalle/:id',
											'defaults' => array(
												'action'	=> 'detalle'
											),
											'constraints' => array(
												'id' => '[1-9]\d*'
											),
										),
									),
                ),
            ),
        ),
    ),
		'service_manager' => array(
			'invokables' => array(
				
			),
			'factories' => array(
				/*::::::::SERVICES:::::::::::::*/
				'Trabajo\Service\TrabajoServiceInterface' 				=> 'Trabajo\Service\Factory\TrabajoServiceFactory',
				/*:::::::::MAPPER::::::::::::::*/
			  'Trabajo\Mapper\TrabajoMapperInterface' => 'Trabajo\Mapper\Factory\TrabajoFactory',
			  'Trabajo\Mapper\TrabajoFotosMapperInterface' => 'Trabajo\Mapper\Factory\TrabajoFotosFactory',
			),
		),
		'controllers' => array(
		 'factories' => array(
					/*:::::::::TRABAJO::::::::::::::*/
				 'Trabajo\Controller\ListTrabajo' 	 => 'Trabajo\Controller\Trabajo\Factory\ListTrabajoControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
