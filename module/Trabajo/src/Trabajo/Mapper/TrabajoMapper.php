<?php
namespace Trabajo\Mapper;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Expression;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

use Trabajo\Model\TrabajoInterface as TrabajoPrototipe;
use Trabajo\Model\TrabajoInterface;

class TrabajoMapper implements TrabajoMapperInterface {
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	protected $hydrator;
	
	/**
	 * @var 'Trabajo\Model\TrabajoInterface
	 */
	protected $trabajoPrototype;
	
	protected $trabajoFotosMapper;

	/**
	* @param AdapterInterface  $dbAdapter
	*/
	public function __construct (
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
    TrabajoPrototipe $trabajoPrototype,
		TrabajoFotosMapperInterface $trabajoFotosMapper
	) {
		
			$this->dbAdapter = $dbAdapter;
			$this->hydrator = $hydrator;
			$this->trabajoPrototype = $trabajoPrototype;
			$this->trabajoFotosMapper = $trabajoFotosMapper;
		
		}
		
	/**
	 * @return array|TrabajoInterface[]
	 */	
	public function findAll($limit = null) {

		$sql 		= new Sql($this->dbAdapter);
		$select = $sql->select('trabajo');
		
		if($limit) {
		        $select->order('tr_codigo DESC');
			$select->limit($limit);
			$id = $this->destacado()->getTr_codigo();
			$select->where(' not tr_codigo = ' . $id );
		}
		
		$stmt		= $sql->prepareStatementForSqlObject($select);
		$result	=	$stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult()) {
				
				$resultSet = new HydratingResultSet(
						$this->hydrator,
						$this->trabajoPrototype
				);
				
				$trabajos = $resultSet->initialize($result);
				$resultSet->buffer();
				foreach($trabajos as $trabajo) {
					
					$codigo = $trabajo->getTr_codigo();
					$trabajoImagenesObj = $this->trabajoFotosMapper->findAllByCodigo($codigo);
					$trabajo->setImagenes($trabajoImagenesObj);				
				}

				return $trabajos;
		}
		
		return array();
		
	}

	public function find($id) {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('trabajo');
		$select->where(array('tr_codigo = ?' => $id));
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 $trabajo = $this->hydrator->hydrate($result->current(), $this->trabajoPrototype);
			 $imagenes = $this->trabajoFotosMapper->findAllByCodigo($trabajo->getTr_codigo());
			 $trabajo->setImagenes($imagenes);
			 return $trabajo;
		}

		throw new \InvalidArgumentException("Trabajo with given ID:{$id} not found.");
		
	}
	
	public function destacado() {
		
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('trabajo');
		$select->order('tr_codigo DESC');
		$select->limit(1);
		
		$stmt   = $sql->prepareStatementForSqlObject($select);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
			 $trabajo = $this->hydrator->hydrate($result->current(), $this->trabajoPrototype);
			 $imagenes = $this->trabajoFotosMapper->findAllByCodigo($trabajo->getTr_codigo());
			 $trabajo->setImagenes($imagenes);

			 return $trabajo;
		}

		throw new \InvalidArgumentException("Trabajo with given ID:{$id} not found.");
		
	}
	
	public function save(TrabajoInterface $trabajoObject) {
		
		$trabajoData = $this->hydrator->extract($trabajoObject);
		unset($trabajoData['id']); // Neither Insert nor Update needs the ID in the array

		if ($trabajoObject->getId()) {
			// ID present, it's an Update
			$action = new Update('trabajo');
			$action->set($trabajoData);
			$action->where(array('id = ?' => $trabajoObject->getId()));
		} else {
			// ID NOT present, it's an Insert
			$action = new Insert('trabajo');
			$action->values($trabajoData);
		}

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		if ($result instanceof ResultInterface) {
			if ($newId = $result->getGeneratedValue()) {
				// When a value has been generated, set it on the object
				$trabajoObject->setId($newId);
			}

			return $trabajoObject;
		}

		throw new \Exception("Database error");
	}
	
	public function delete(TrabajoInterface $trabajoObject) {
		
		$action = new Delete('trabajo');
		$action->where(array('id = ?' => $trabajoObject->getId()));

		$sql    = new Sql($this->dbAdapter);
		$stmt   = $sql->prepareStatementForSqlObject($action);
		$result = $stmt->execute();

		return (bool)$result->getAffectedRows();
	}

}