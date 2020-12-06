<?php  
use Framework\Controller;
use Framework\View;
    class SignupController extends Controller
    {
        public function run():void
        {
            $this->sessionManager->create();


            if(isset($_SESSION["LoggedIn"]) && !$this->sessionManager->accessible($_SESSION["LoggedIn"],"signup.php"))
            {
                header("Location:index.php?controller=Profile");
            }
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $fullname = $this->commandContext->get("formFullName");
                $email = $this->commandContext->get("email");
                $password = $this->commandContext->get("password");
                $repassword = $this->commandContext->get("repassword");

                $errors = array();
                if(!$this->validator->validEmail($email))
                {
                    array_push($errors,"Invalid Email");
                }
                if(!$this->validator->validPassword($password))
                {
                    array_push($errors,"Invalid Password Format/Length");
                }
                if(!$this->validator->validRePassword($password,$repassword))
                {
                    array_push($errors,"Invalid Passwords Do Not Match!");
                }

                if($errors == array())
                {
                  $this->setModel(new UsersModel());
                  $this->getModel()->makeConnection();
                  $this->sessionManager->create();
                  $this->sessionManager->add("success","Sign Up Successful. Please login below");
                  $this->getModel()->registerUsers($fullname,$email,password_hash($password, PASSWORD_DEFAULT));
                  $this->responseHandler->getHeader()->setData("Header", "Normal");
                  $this->responseHandler->getState()->setData("State", "Normal");
                  $this->responseHandler->getLogResponse()->setData("Logger", "User Added to the database");
                  $this->sessionManager->create();
                  $this->sessionManager->add("Response Handler", $this->responseHandler);
                  header("Location:index.php?controller=Login");
                }
                else
                {
                  $this->setView(new View());
                  $this->getView()->setTemplate("../../400001784-framework/tpl/signup.tpl.php");
                  $this->getView()->addVar("errors",$errors);
                  $this->responseHandler->getHeader()->setData("Header", "Normal");
                  $this->responseHandler->getState()->setData("State", "Normal");
                  $this->responseHandler->getLogResponse()->setData("Logger", "Signup page has errors");
                  $this->sessionManager->create();
                  $this->sessionManager->add("Response Handler", $this->responseHandler);
                  $this->getView()->display();
                }
            }else
            {
                $this->setView(new View());
                $this->getView()->setTemplate("../../400001784-framework/tpl/signup.tpl.php");
                $this->responseHandler->getHeader()->setData("Header", "Normal");
                $this->responseHandler->getState()->setData("State", "Normal");
                $this->responseHandler->getLogResponse()->setData("Logger", "Signup page was visted");
                $this->sessionManager->create();
                $this->sessionManager->add("Response Handler", $this->responseHandler);
                $this->getView()->display();
            }        
        }
    }
?>