<?php
namespace Trabajo\Mapper;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

use Trabajo\Model\TrabajoFotosInterface as TrabajoFotosPrototipe;
use Trabajo\Model\TrabajoFotosInterface;

class TrabajoFotosMapper implements TrabajoFotosMapperInterface {
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	protected $hydrator;
	
	/**
	 * @var 'Trabajo\Model\TrabajoFotosInterface
	 */
	protected $trabajoFotosPrototype;

	/**
	* @param AdapterInterface  $dbAdapter
	*/
	public function __construct (
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
    TrabajoFotosPrototipe $trabajoFotosPrototype
	) {
		
			$this->dbAdapter = $dbAdapter;
			$this->hydrator = $hydrator;
			$this->trabajoFotosPrototype = $trabajoFotosPrototype;
		
		}
		
	/**
	 * @return array|TrabajoFotosInterface[]
	 */	
	public function findAll() {
		
		$sql 		= new Sql($this->dbAdapter);
		$select = $sql->select('trabajos_imagenes');
		
		$stmt		= $sql->prepareStatementForSqlObject($select);
		$result	=	$stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult()) {
				
				$resultSet = new HydratingResultSet(
						$this->hydrator,
						$this->trabajoFotosPrototype
				);
				
				return $resultSet->initialize($result);
		}
		
		return array();
		
	}	
	public function findAllByCodigo($codigo) {
		
		$sql 		= new Sql($this->dbAdapter);
		$select = $sql->select('trabajos_imagenes');
		
		$select->where(array('tr_codigo = ?' => $codigo));
		
		$stmt		= $sql->prepareStatementForSqlObject($select);
		$result	=	$stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult()) {
				
				$resultSet = new HydratingResultSet(
						$this->hydrator,
						$this->trabajoFotosPrototype
				);
				
				return $resultSet->initialize($result);
		}
		
		return array();
		
	}

	public function find($id) {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('trabajos_imagenes');
		$select->where(array('tri_codigo = ?' => $id));
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
    $result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 return $this->hydrator->hydrate($result->current(), $this->trabajoFotosPrototype);
		}

		throw new \InvalidArgumentException("Trabajo Imagen with given ID:{$id} not found.");
		
	}	
	
	public function findByTrabajo($id) {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('trabajos_imagenes');
		$select->where(array('tr_codigo = ?' => $id));
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
    $result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 return $this->hydrator->hydrate($result->current(), $this->trabajoFotosPrototype);
		}

		throw new \InvalidArgumentException("Trabajo with given ID:{$id} not found.");
		
	}
	
	public function save(TrabajoFotosInterface $trabajoImagenObject) {
		
		$trabajoData = $this->hydrator->extract($trabajoImagenObject);
		unset($trabajoData['tri_codigo']); // Neither Insert nor Update needs the ID in the array

		if ($trabajoImagenObject->getTri_codigo()) {
			// ID present, it's an Update
			$action = new Update('trabajos_imagenes');
			$action->set($trabajoData);
			$action->where(array('tri_codigo = ?' => $trabajoImagenObject->getTri_codigo()));
		} else {
			// ID NOT present, it's an Insert
			$action = new Insert('trabajos_imagenes');
			$action->values($trabajoData);
		}

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface) {
			if ($newId = $result->getGeneratedValue()) {
				// When a value has been generated, set it on the object
				$trabajoImagenObject->setId($newId);
			}

			return $trabajoImagenObject;
		}

		throw new \Exception("Database error");
	}
	
	public function delete(TrabajoFotosInterface $trabajoImagenObject) {
		
		$action = new Delete('trabajos_imagenes');
		$action->where(array('tri_codigo = ?' => $trabajoImagenObject->getTri_codigo()));

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		return (bool)$result->getAffectedRows();
	}

}