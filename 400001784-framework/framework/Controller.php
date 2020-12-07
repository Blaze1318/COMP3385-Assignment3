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
	protected $mapper;

	function __construct()
	{
		$this->model = null;
		$this->view = null;
		$this->mapper = null;
		$this->commandContext = null;
		$this->validator = Registry::instance()->makeValidator();
		$this->responseHandler = ResponseHandler::getInstance();
		$this->sessionManager = Registry::instance()->getSession();
	}

	public function setMapper(DataMapper $m)
	{
		$this->mapper = $m;
	}

	public function getMapper()
	{
		return $this->mapper;
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