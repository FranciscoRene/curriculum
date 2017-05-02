<?php
namespace Empresa\Mapper;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

use Empresa\Model\EmpresaInterface as EmpresaPrototipe;
use Empresa\Model\EmpresaInterface;

class EmpresaMapper implements EmpresaMapperInterface {
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	protected $hydrator;
	
	/**
	 * @var 'Empresa\Model\EmpresaInterface
	 */
	protected $empresaPrototype;
	

	/**
	* @param AdapterInterface  $dbAdapter
	*/
	public function __construct (
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
    EmpresaPrototipe $empresaPrototype
	) {
		
			$this->dbAdapter = $dbAdapter;
			$this->hydrator = $hydrator;
			$this->empresaPrototype = $empresaPrototype;
		
		}
		
	/**
	 * @return array|EmpresaInterface[]
	 */	
	public function findAll() {
		
		$sql 		= new Sql($this->dbAdapter);
		$select = $sql->select('empresa');
		
		$stmt		= $sql->prepareStatementForSqlObject($select);
		$result	=	$stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult()) {
				
				$resultSet = new HydratingResultSet(
						$this->hydrator,
						$this->empresaPrototype
				);
				
				return $resultSet->initialize($result);

		}
		
		return array();
		
	}

	public function find($id) {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('empresa');
		$select->where(array('em_codigo = ?' => $id));
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
    $result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 $contacto = $this->hydrator->hydrate($result->current(), $this->empresaPrototype);
			 return $contacto;
		}

		throw new \InvalidArgumentException("Empresa with given ID:{$id} not found.");
		
	}
	
	public function save(EmpresaInterface $empresaObject) {
		
		$contactoData = $this->hydrator->extract($empresaObject);
		unset($contactoData['id']); // Neither Insert nor Update needs the ID in the array

		if ($empresaObject->getId()) {
			// ID present, it's an Update
			$action = new Update('empresa');
			$action->set($contactoData);
			$action->where(array('em_codigo = ?' => $empresaObject->getId()));
		} else {
			// ID NOT present, it's an Insert
			$action = new Insert('empresa');
			$action->values($contactoData);
		}

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface) {
			if ($newId = $result->getGeneratedValue()) {
				// When a value has been generated, set it on the object
				$empresaObject->setId($newId);
			}

			return $empresaObject;
		}

		throw new \Exception("Database error");
	}
	
	public function delete(EmpresaInterface $empresaObject) {
		
		$action = new Delete('empresa');
		$action->where(array('em_codigo = ?' => $empresaObject->getId()));

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		return (bool)$result->getAffectedRows();
	}

}