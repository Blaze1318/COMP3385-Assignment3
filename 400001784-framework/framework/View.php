<?php
namespace Framework;
class View
{
	 private $vars = array();
     private $tpl = "";


	public function setTemplate($filename)
	{
		$this->tpl = $filename;
	}

	public function getTemplate():string
	{
		return $this->tpl;
	}


	public function display():void
	{
		if($this->vars != array())
		{
			extract($this->vars);
		}
        require $this->tpl;
	}

	public function addVar($name,$value):void
	{
		 $this->vars[$name] = $value;
	}

	public function getVars(): array
	{
		return $this->vars;
	}
}