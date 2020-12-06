<?php
namespace Framework;
    abstract class Model{
        use ModelMethods;
        protected $id;
        protected $databaseConnection;
        
        public function setID(string $id):void {
            $this->id = $id;
        }
    }
?>