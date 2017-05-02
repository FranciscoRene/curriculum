<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    // 'router' => array(
        // 'routes' => array(
            // 'empresa' => array(
                // 'type'    => 'Literal',
                // 'options' => array(
                    // 'route'    => '/empresa',
                    // 'defaults' => array(
                        // 'controller'    => 'Empresa\Controller\FormEmpresa',
                        // 'action'        => 'index',
                    // ),
                // ),
                // 'may_terminate' => true,
                // 'child_routes' => array(
									// 'contacto-envio' =>array(
										// 'type' => 'Literal',
										// 'options' => array(
											// 'route' 	 => '/envio',
											// 'defaults' => array(
												// 'controller'    => 'Empresa\Controller\SendEmpresa',
												// 'action'	=> 'send'
											// ),
										// ),
									// ),
                // ),
            // ),
        // ),
    // ),
		'service_manager' => array(
			'invokables' => array(
				
			),
			'factories' => array(
				/*::::::::SERVICES:::::::::::::*/
				'Empresa\Service\EmpresaServiceInterface' 				=> 'Empresa\Service\Factory\EmpresaServiceFactory',
				/*:::::::::MAPPER::::::::::::::*/
			  'Empresa\Mapper\EmpresaMapperInterface' => 'Empresa\Mapper\Factory\EmpresaFactory',
			),
		),
		'controllers' => array(
		 'factories' => array(
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
