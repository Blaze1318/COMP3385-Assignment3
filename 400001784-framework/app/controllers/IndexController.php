<?php  
use Framework\Controller;
use Framework\View;
class IndexController extends Controller
{ 
	public function run():void
	{
		$this->setModel(new CoursesModel());
		$this->setView(new View);
		$this->getView()->setTemplate("../../400001784-framework/tpl/index.tpl.php");
		$this->getModel()->makeConnection();
		$this->getView()->addVar("popular",$this->getModel()->findMostPopular());
		$this->getView()->addVar("recommended",$this->getModel()->findRecommended());
		$this->responseHandler->getHeader()->setData("Header", "Normal");
        $this->responseHandler->getState()->setData("State", "Normal");
        $this->responseHandler->getLogResponse()->setData("Logger", "Index page was visted");
        $this->sessionManager->create();
        $this->sessionManager->remove("LoggedIn");
        $this->sessionManager->add("Response Handler", $this->responseHandler);
		$this->getView()->display();
		
	}
}

?>