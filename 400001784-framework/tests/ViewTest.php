<?php
 require "../framework/autoloader.php";
use PHPunit\Framework\Testcase;

class ViewTest extends Testcase
{
	public function testViewObject()
	{
		$view = new View();
		$this->assertInstanceOf('View',$view);
	}

	public function testViewSetTemplate()
	{
		$view = new View();
		$text = "../tpl/index.tpl.php";
		$view->setTemplate($text);
		$this->assertEquals($text,$view->getTemplate());
	}

	public function testViewDisplay()
	{
		$view = new View();
		$text = "../tpl/index.tpl.php";
		$view->setTemplate($text);
		$data = file_get_contents("../data/courses.json");
		$jsonData = json_decode($data,true);
		$model = new CoursesModel();
		$model->attach($view);
		$model->setData($model->getAll());
		$model->notify();
		$name = "David";
		$value = "22";
		$tmpArray = array();
		$tmpArray[$name] = $value;
		$view->addVar($name,$value);
		$view->display();
		$this->assertEquals($text,$view->getTemplate());
	}

	public function testViewAddVar()
	{
		$view = new View();
		$name = "David";
		$value = "22";
		$tmpArray = array();
		$tmpArray[$name] = $value;
		$view->addVar($name,$value);
		$this->assertEquals($tmpArray,$view->getVars());
	}
}

?>