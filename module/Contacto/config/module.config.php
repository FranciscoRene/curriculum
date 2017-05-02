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
            'contacto' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/contacto',
                    'defaults' => array(
                        'controller'    => 'Contacto\Controller\FormContacto',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
									'contacto-envio' =>array(
										'type' => 'Literal',
										'options' => array(
											'route' 	 => '/envio',
											'defaults' => array(
												'controller'    => 'Contacto\Controller\SendContacto',
												'action'	=> 'send'
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
				'Contacto\Service\ContactoServiceInterface' 				=> 'Contacto\Service\Factory\ContactoServiceFactory',
				/*:::::::::MAPPER::::::::::::::*/
			  'Contacto\Mapper\ContactoMapperInterface' => 'Contacto\Mapper\Factory\ContactoFactory',
			),
		),
		'controllers' => array(
		 'factories' => array(
					/*:::::::::TRABAJO::::::::::::::*/
				 'Contacto\Controller\FormContacto' 	 => 'Contacto\Controller\Contacto\Factory\FormContactoControllerFactory',
				 'Contacto\Controller\SendContacto' 	 => 'Contacto\Controller\Send\Factory\SendContactoControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
				'strategies'	=> array(
					'ViewJsonStrategy',
				),
    ),
);
