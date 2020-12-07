<?php
	use Framework\DataMapper;
	use Framework\StreamsObject;
	class StreamsMapper extends DataMapper
	{

		public function find($id): DomainObject {
            $sql = "SELECT * FROM streams WHERE stream_id = '".$id."'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            $stream = new Stream($res[0]["stream_name"], $res[0]["stream_image"], $res[0]["instructor_name"]);
            return $stream;
        }

        public function findAll(): array
        {
        	$stmt = $this->databaseConnection->prepare("SELECT * FROM streams");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

       
		
		public function insert(DomainObject $obj): void
		{
			 $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO users (name,email,password)
              VALUES ('".$obj->getName()."', '".$obj->getEmail()."', '".$obj->getPassword()."')";
              $stmt = $this->pdo->prepare($sql);
              $stmt->execute();
		}

		public function findStreams():array
        {

            $sql = "SELECT streams.stream_name,streams.stream_image, instructors.instructor_name 
                    FROM streams 
                    INNER JOIN stream_instructor ON streams.stream_id = stream_instructor.stream_id 
                    INNER JOIN instructors ON stream_instructor.instructor_id = instructors.instructor_id 
                    ORDER BY streams.stream_name DESC
                    LIMIT 8";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

		public function update(DomainObject $object)
		{

		}
		public function select($id): DomainObject
		{
            $stream = new Stream("", "", "");
            return $stream;
		}

	}
?>