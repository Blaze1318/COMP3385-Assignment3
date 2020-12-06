<?php  
use Framework\Controller;
use Framework\View;
class CoursesController extends Controller
{ 
	public function run():void
	{
		$this->sessionManager->create();
		if(isset($_SESSION["LoggedIn"]))
       {
            if($this->sessionManager->accessible($_SESSION["LoggedIn"],"courses.php"))
            {
                	$this->setModel(new CoursesModel());
					        $this->setView(new View);
					        $this->getView()->setTemplate("../../400001784-framework/tpl/courses.tpl.php");
					        $this->getModel()->makeConnection();
					        $this->getView()->addVar("courses",$this->getModel()->findCourses());
					        $this->responseHandler->getHeader()->setData("Header", "Normal");
       			      $this->responseHandler->getState()->setData("State", "Normal");
       			      $this->responseHandler->getLogResponse()->setData("Logger", "Courses Page visited");
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