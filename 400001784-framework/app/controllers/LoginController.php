<?php  
use Framework\Controller;
use Framework\View;
    class LoginController extends Controller
    {
        public function run():void
        {
            $this->sessionManager->create();
            if(isset($_SESSION["LoggedIn"]) && !$this->sessionManager->accessible($_SESSION["LoggedIn"],"login.php"))
            {
                header("Location:index.php?controller=Profile");
            }
           
            if($_SERVER["REQUEST_METHOD"] == "GET")
            {
                $this->setView(new View);
                $this->getView()->setTemplate("../../400001784-framework/tpl/login.tpl.php");
                $this->getView()->display();
            }
            elseif($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $email = $this->commandContext->get("email");
                $password = $this->commandContext->get("password");
                $this->setModel(new UsersModel);
                $this->setView(new View);
                $this->getView()->setTemplate("../../400001784-framework/tpl/login.tpl.php");
                $this->getModel()->makeConnection();
                $user = $this->getModel()->findRecord($email);
                if($user == array())
                {
                    $this->getView()->addVar("loginError","Invalid email/password is empty");
                    $this->getView()->display();
                }
                elseif(!password_verify($password,$user[0]["password"]))
                {
                    $this->getView()->addVar("loginError","Invalid email/password");
                    $this->getView()->display();
                }
                else
                {

                    $this->sessionManager->create();
                    $this->sessionManager->add("LoggedIn",$user[0]["email"]);
                    $this->responseHandler->getHeader()->setData("Header", "Normal");
                    $this->responseHandler->getState()->setData("State", "Normal");
                    $this->responseHandler->getLogResponse()->setData("Logger", "User Added to the database");
                    $this->sessionManager->create();
                    $this->sessionManager->add("Response Handler", $this->responseHandler);
                    header("Location:index.php?controller=Profile");
                }       
       	     }
       	}
    }
?>