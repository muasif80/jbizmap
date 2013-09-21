<?php

	class JbizmapControllersDisplay extends JControllerBase {
		
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
			$viewName = $app->input->getWord("view", "default");
			$viewFormat = $document->getType();
			
			$task = $app->input->getWord("task", "default");
			
			if($task == 'showmap'){
				$layoutName = $app->input->getWord("layout", "map");
			}else{
				$layoutName = $app->input->getWord("layout", "default");
			}
			
			
			$app->input->set("view", $viewName);
			
			$paths = new SplPriorityQueue();
			$paths->insert(JPATH_COMPONENT . "/views/" . $viewName . "/tmpl", "normal");
			
			$viewClass = "JbizmapViews" . ucfirst($viewName) . ucfirst($viewFormat);
			
			
			$modelClass = "JbizmapModels" . ucfirst($viewName);
			
			$view = new $viewClass(new $modelClass(), $paths);
			
			$view->setLayout($layoutName);
			
			echo $view->render();
		}
	}