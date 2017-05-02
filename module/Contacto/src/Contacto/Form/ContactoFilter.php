<?php
namespace Contacto\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class ContactoFilter extends InputFilter {
	
	public function __construct() {
		
		//self::__construct();
		
		$this->add(array(
			'name'     => 'con_nombre',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 4,
						'max'      => 50,
					),
				),		
			),
		));	
		
		$this->add(array(
			'name'       => 'con_telefono',
			'required'   => false,			
			'validators' => array(
				array(
					'name' => 'Contacto\Form\Validator\TelefonoValidator'
				),
			),
		));			
		
		$this->add(array(
			'name'       => 'con_email',
			'required'   => true,			
			'validators' => array(
				array(
					'name' => 'EmailAddress'
				),
			),
		));

		$this->add(array(
			'name'     => 'con_mensaje',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'max'      => 600,
					),
				),		
			),
		));	
	}
}