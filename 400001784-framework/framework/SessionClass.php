<?php
namespace Framework;
class SessionClass
{
	private static $instance = null;

	public  function create()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
	}

	public  function destroy()
	{
		if (session_status() == PHP_SESSION_ACTIVE) 
		{ 
			session_destroy(); 
		}
	}

	public  function add($name,$value)
	{
		if (session_status() == PHP_SESSION_ACTIVE) 
		{ 
			$_SESSION[$name] = $value;
		}
	}

	public  function remove($name)
	{
		if (session_status() == PHP_SESSION_ACTIVE) 
		{ 
			unset($_SESSION[$name]);
		}
	}

	public function userLoggedIn():bool
	{
		if (session_status() == PHP_SESSION_ACTIVE) 
		{ 
			if(isset($_SESSION["LoggedIn"]))
			{
				return true;
			}
		}
		return false;
	}

	public function accessible($user,$page):bool
	{
		   if (session_status() == PHP_SESSION_ACTIVE){
                if (isset($_SESSION["LoggedIn"])){
                    if ($_SESSION["LoggedIn"] == $user && $page !== "login.php" && $page !== "signup.php") {
                        return true;
                    }
                } else {
                    if($page !== "courses.php" && $page !== "profile.php"){
                        return true;
                    }
                }
            }
            return false;
	}

	public static function getInstance():SessionClass {
		if(!self::$instance) {
			self::$instance = new SessionClass();
		}

		return self::$instance;
	}
}