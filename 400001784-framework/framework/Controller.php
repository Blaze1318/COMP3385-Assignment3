<?php
 namespace Framework;
abstract class Controller
{
	protected $model = null;
	protected $view = null;
	protected $commandContext;
	protected $validator;
	protected $responseHandler;
	protected $sessionManager;

	function __construct()
	{
		$this->model = null;
		$this->view = null;
		$this->commandContext = null;
		$this->validator = Validator::getInstance();
		$this->responseHandler = ResponseHandler::getInstance();
		$this->sessionManager = SessionClass::getInstance();
	}

	public function setModel(Model $m)
	{
		$this->model = $m;
	}

	public function setView(View $v)
	{
		$this->view = $v;
	}

	public function getModel()
	{
		return $this->model;
	}

	public function getView()
	{
		return $this->view;
	}

	public function setCommandContext(CommandContext $context)
	{
		$this->commandContext = $context;
	}

	abstract public function run():void;
}

?>