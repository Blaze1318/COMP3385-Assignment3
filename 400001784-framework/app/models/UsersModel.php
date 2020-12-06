<?php
use Framework\Model;
use Framework\SessionClass;
   class UsersModel extends Model
   {
        public function makeConnection():void
        {
            $dbconnect = new DatabaseConnect();
            $this->databaseConnection = $dbconnect->createConnection();
        }
        public function findAll(): array
        {
            $stmt = $this->databaseConnection->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findRecord(string $id):array
        {
            $stmt = $this->databaseConnection->prepare("SELECT * FROM users WHERE email ='".$id."'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //var_dump($stmt->fetch());
            return $stmt->fetchAll();
        }

        public function registerUsers($name,$email,$password):void
        {
          echo strlen($password);
              $this->databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO users (name,email,password)
              VALUES ('".$name."', '".$email."', '".$password."')";
              $stmt = $this->databaseConnection->prepare($sql);
              $stmt->execute();
        }

        public function getCourses():array
        {
            SessionClass::create();
            $user = $_SESSION['LoggedIn'];
            $sql = "SELECT DISTINCT courses.course_name, faculty_department.faculty_dept_name, courses.course_image, instructors.instructor_name 
            FROM faculty_department 
            INNER JOIN faculty_dept_courses ON faculty_department.faculty_dept_id= faculty_dept_courses.faculty_dept_id 
            INNER JOIN courses ON faculty_dept_courses.course_id = courses.course_id 
            INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
            INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
            INNER JOIN user_courses ON courses.course_id = user_courses.course_id 
            INNER JOIN users ON user_courses.email = users.email WHERE user_courses.email = '".$user."'";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>