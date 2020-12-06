<?php  
use Framework\Controller;
use Framework\View;
class StreamsController extends Controller
{ 
	public function run():void
	{
		$this->setModel(new StreamsModel());
		$this->setView(new View);
		$this->getView()->setTemplate("../../400001784-framework/tpl/streams.tpl.php");
		$this->getModel()->makeConnection();
		$this->getView()->addVar("streams",$this->getModel()->findStreams());
		$this->responseHandler->getHeader()->setData("Header", "Normal");
        $this->responseHandler->getState()->setData("State", "Normal");
        $this->responseHandler->getLogResponse()->setData("Logger", "Streams page visited");
        $this->sessionManager->create();
        $this->sessionManager->add("Response Handler", $this->responseHandler);
		$this->getView()->display();
	}
}

?>