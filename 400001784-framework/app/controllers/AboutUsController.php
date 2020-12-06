<?php  
use Framework\Controller;
use Framework\View;
class AboutUsController extends Controller
{ 
	public function run():void
	{
		$this->setView(new View);
		$this->getView()->setTemplate("../../400001784-framework/tpl/aboutus.tpl.php");
		$this->responseHandler->getHeader()->setData("Header", "Normal");
        $this->responseHandler->getState()->setData("State", "Normal");
        $this->responseHandler->getLogResponse()->setData("Logger", "User Profile page visited");
        $this->sessionManager->create();
        $this->sessionManager->add("Response Handler", $this->responseHandler);
		$this->getView()->display();
	}
}

?>