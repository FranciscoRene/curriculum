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
            'curriculum' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/curriculum',
                    'defaults' => array(
                        'controller'    => 'Curriculum\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
									'curriculum-habilidades' =>array(
										'type' => 'Literal',
										'options' => array(
											'route' 	 => '/habilidades',
											'defaults' => array(
												'controller'    => 'Curriculum\Controller\Habilidades',
												'action'	=> 'index'
											),
										),
									),
                ),
            ),
        ),
    ),

		'controllers' => array(
		 'invokables' => array(
				 'Curriculum\Controller\Index' 	 			=> 'Curriculum\Controller\IndexController',
				 'Curriculum\Controller\Habilidades'  => 'Curriculum\Controller\HabilidadesController',
			),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
