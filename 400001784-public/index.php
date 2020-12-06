<?php
    use Framework\FrontController;
    require_once "../../400001784-framework/autoloader.php";
  
    $frontController = new FrontController();
 
    $frontController->getRequestHandler()->route("/", "IndexCommand");
    $frontController->getRequestHandler()->route("/index.php", "IndexCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=SignUp", "SignupCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=AboutUs", "AboutUsCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Login", "LoginCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Streams", "StreamsCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Courses", "CoursesCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Profile", "ProfileCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=LogOut", "LogOutCommand");
    $action = basename($_SERVER['REQUEST_URI']);
    $frontController->getRequestHandler()->dispatch($action);
?>