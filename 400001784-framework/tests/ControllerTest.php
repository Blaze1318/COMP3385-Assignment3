<?php
 require "../framework/autoloader.php";

use PHPunit\Framework\Testcase;

class ControllerTest extends Testcase
{
    public function testControllerObject()
    {
        $IndexController = new IndexController();
        $this->assertInstanceOf('Controller',$IndexController);
    }
    
    public function testControllerSetModel()
    {
        $IndexController = new IndexController();
        $IndexModel = new CoursesModel();
        $IndexController->setModel($IndexModel);
        $this->assertEquals($IndexModel,$IndexController->getModel());
    }

    public function testControllerSetView()
    {
        $IndexController = new IndexController();
        $IndexView = new View();
        $IndexController->setView($IndexView);
        $this->assertEquals($IndexView,$IndexController->getView());
    }

    public function testControllerRun()
    {
        //CANNOT TEST THIS FUNCTION
    } 
}
?>