<?php
	namespace Framework;
	abstract class DataMapper
	{
		protected $pdo;
		public function __construct()
		{
			$dbconnect = new DatabaseConnect();
			$this->pdo = $dbconnect->createConnection();
		}

		abstract public function find(string $id): DomainObject;
        abstract public function findAll(): array;
		abstract public function insert(DomainObject $obj): void;
		abstract public function update(DomainObject $object);
		abstract public function select($id): DomainObject;

	}
?>