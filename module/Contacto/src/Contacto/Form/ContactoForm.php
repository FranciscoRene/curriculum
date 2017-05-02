<?php
namespace Contacto\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class ContactoForm extends Form {
	
	public function __construct($name = null) {
  
		parent::__construct('contacto');
	
	}

	public function prepareElements() {
		
		$this->add(array(
				'name' => 'con_nombre',
				'options' => array(
				),
				'attributes' => array(
						'type'  => 'text',
				),
		));			

		$this->add(array(
				'type' => 'Zend\Form\Element\Email',
				'name' => 'con_email',
				'options' => array(
						'label' => 'Your email address',
				),
		));

		$this->add(array(
				'name' => 'con_telefono',
				'options' => array(
				),
				'attributes' => array(
						'type'  => 'text',
				),
		));
		// $this->add(array(
				// 'name' => 'subject',
				// 'options' => array(
						// 'label' => 'Subject',
				// ),
				// 'attributes' => array(
						// 'type'  => 'text',
				// ),
		// ));
			
		$this->add(array(
				'type' => 'Zend\Form\Element\Textarea',
				'name' => 'con_mensaje',
				'options' => array(

				),
		));
			
		// $this->add(array(
				// 'type' => 'Zend\Form\Element\Captcha',
				// 'name' => 'captcha',
				// 'options' => array(
						// 'label' => 'Please verify you are human.',
						// 'captcha' => $this->captcha,
				// ),
		// ));
		
		// $this->add(new Element\Csrf('security'));

	}
}