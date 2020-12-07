<?php
use Framework\Controller;
use Framework\View;
use Framework\DataMapper;
    class ProfileController extends Controller
    {
        public function run():void
        {
            $this->sessionManager->create();
            if(isset($_SESSION["LoggedIn"]))
            {
                 if($this->sessionManager->accessible($_SESSION["LoggedIn"],"profile.php"))
                 {
                     
                    // $this->setModel(new UsersModel());
                     $this->setMapper(new UsersMapper());
                     $this->setView(new View);
                     $this->getView()->setTemplate("../../400001784-framework/tpl/profile.tpl.php");
                    // $this->getModel()->makeConnection();
                     $this->getView()->addVar("mycourses",$this->getMapper()->getCourses());
                     $this->responseHandler->getHeader()->setData("Header", "Normal");
                     $this->responseHandler->getState()->setData("State", "Normal");
                     $this->responseHandler->getLogResponse()->setData("Logger", "User Profile page visited");
                     $this->sessionManager->create();
                     $this->sessionManager->add("Response Handler", $this->responseHandler);
                     $this->getView()->display();
                 }
                 else
                 {
                  
                   header("Location:index.php");
                 }
            }
            else{
                header("Location:index.php");
            }
        }
    }
 
?>