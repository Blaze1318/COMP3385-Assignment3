<?php  
use Framework\Controller;
use Framework\View;
class LogOutController extends Controller
{ 
	public function run():void
	{
		$this->sessionManager->remove("LoggedIn");
		$this->sessionManager->destroy();
		$this->responseHandler->getHeader()->setData("Header", "Normal");
        $this->responseHandler->getState()->setData("State", "Normal");
        $this->responseHandler->getLogResponse()->setData("Logger", "User Logged Out");
        $this->sessionManager->create();
        $this->sessionManager->remove("LoggedIn");
        $this->sessionManager->add("Response Handler", $this->responseHandler);
		header("Location:index.php");
	}
}

?>