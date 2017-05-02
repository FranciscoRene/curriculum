<?php
namespace Contacto\Mapper;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

use Contacto\Model\ContactoInterface as ContactoPrototipe;
use Contacto\Model\ContactoInterface;

class ContactoMapper implements ContactoMapperInterface {
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	protected $hydrator;
	
	/**
	 * @var 'Contacto\Model\ContactoInterface
	 */
	protected $contactoPrototype;
	

	/**
	* @param AdapterInterface  $dbAdapter
	*/
	public function __construct (
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
    ContactoPrototipe $contactoPrototype
	) {
		
			$this->dbAdapter = $dbAdapter;
			$this->hydrator = $hydrator;
			$this->contactoPrototype = $contactoPrototype;
		
		}
		
	/**
	 * @return array|ContactoInterface[]
	 */	
	public function findAll() {
		
		$sql 		= new Sql($this->dbAdapter);
		$select = $sql->select('contactos');
		
		$stmt		= $sql->prepareStatementForSqlObject($select);
		$result	=	$stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult()) {
				
				$resultSet = new HydratingResultSet(
						$this->hydrator,
						$this->contactoPrototype
				);
				
				return $resultSet->initialize($result);

		}
		
		return array();
		
	}

	public function find($id) {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('contactos');
		$select->where(array('con_codigo = ?' => $id));
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
    $result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 $contacto = $this->hydrator->hydrate($result->current(), $this->contactoPrototype);
			 return $contacto;
		}

		throw new \InvalidArgumentException("Contacto with given ID:{$id} not found.");
		
	}
	
	public function save(ContactoInterface $contactoObject) {
		
		$contactoData = $this->hydrator->extract($contactoObject);
		unset($contactoData['id']); // Neither Insert nor Update needs the ID in the array

		if ($contactoObject->getCon_codigo()) {
			// ID present, it's an Update
			$action = new Update('contactos');
			$action->set($contactoData);
			$action->where(array('con_codigo = ?' => $contactoObject->getCon_codigo()));
		} else {
			// ID NOT present, it's an Insert
			$action = new Insert('contactos');
			$action->values($contactoData);
		}

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface) {
			if ($newId = $result->getGeneratedValue()) {
				// When a value has been generated, set it on the object
				$contactoObject->setCon_codigo($newId);
			}

			return $contactoObject;
		}

		throw new \Exception("Database error");
	}
	
	public function delete(ContactoInterface $contactoObject) {
		
		$action = new Delete('contactos');
		$action->where(array('con_codigo = ?' => $contactoObject->getId()));

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		return (bool)$result->getAffectedRows();
	}

}