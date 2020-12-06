<?php
use Framework\Command;
use Framework\CommandContext;
	class AboutUsCommand extends Command
	{
		function __construct() {
			$this->controller = new AboutUsController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>