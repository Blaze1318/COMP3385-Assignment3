<?php
use Framework\Model;
     class SignupModel extends Model
     {
          public function getAll(): array
          {
              $data = file_get_contents("../data/users.json");
              return json_decode($data,true);
          }
  
          public function getRecord(string $id):array
          {
              $data = file_get_contents("../data/users.json");
              $jsondata = json_decode($data,true);
  
              foreach ($jsondata as $key) {
                  if ($key["email"] == $id) {
                      return $key;
                  }
              }
              return [];
          }
      }
?>