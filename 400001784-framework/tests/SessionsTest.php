<?php
 require "../framework/autoloader.php";
use PHPunit\Framework\Testcase;

class SessionsTest extends Testcase
{
	public function testSessionObject()
	{
		$session = new SessionClass();
		$this->assertInstanceOf('SessionClass',$session);
	}

	public function testCreate()
	{
		SessionClass::create();
		$this->assertEquals(PHP_SESSION_ACTIVE,true);
	}

	public function testDestroy()
	{
		SessionClass::create();
		SessionClass::destroy();
		$this->assertEquals(PHP_SESSION_NONE,true);
	}

	public function testAdd()
	{
		SessionClass::create();
		SessionClass::add("Test","Test123");
		$this->assertEquals("Test123",$_SESSION["Test"]);
	}

	public function testRemove()
	{
		SessionClass::create();
		SessionClass::add("Test","Test123");
		SessionClass::remove("Test");
		$this->assertEquals(isset($_SESSION["Test"]),false);
	}

	public function testAccessible()
	{
		SessionClass::create();
		SessionClass::add("LoggedIn","Test123");
		$this->assertEquals(SessionClass::accessible("LoggedIn","login.php"),false);
		$this->assertEquals(SessionClass::accessible("LoggedIn","login.php"),false);
		SessionClass::remove("LoggedIn");
		$this->assertEquals(SessionClass::accessible(null,"index.php"),true);
		$this->assertEquals(SessionClass::accessible(null,"signup.php"),true);
		$this->assertEquals(SessionClass::accessible(null,"courses.php"),false);
		$this->assertEquals(SessionClass::accessible(null,"profile.php"),false);
	}
}
?>