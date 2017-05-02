<?php
namespace Contacto\Form\Validator;

class TelefonoValidator extends \Zend\Validator\AbstractValidator {
	const TELEFONO = 'Telefono';

	protected $messageTemplates = array(
			self::TELEFONO => "'%value%' no es un teléfono válido"
	);

	public function isValid($value)	{ 
	
		$this->setValue($value);
		
		if (!preg_match('/^[0-9+-\/ \/]{8,15}$/', $value)) {
				$this->error(self::TELEFONO);
				return false;
		}
	
		return true;
		
	}
	
}