<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	// no direct access
	defined('_JEXEC') or die('Restricted access');

	class JbizmapControllersDisplay extends JControllerBase {
		
		//var $id = null;
		
		public function execute(){
			
// 			echo "0";
// 			exit;
			
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
// 			echo "1";
// 			exit;
			
			$viewName = $app->input->getWord("view", "default");
			$viewFormat = $document->getType();
			
			$task = $app->input->getWord("task", "default");
			//echo "Task : " . $task;
			if($task == 'showmap'){
				$layoutName = $app->input->getWord("layout", "map");
			}else if($task == 'bizdetail'){
				//echo "here";
				$layoutName = $app->input->getWord("layout", "bizdetail");
				//$this->id = $app->input->getInt("id");
			}else{
				$layoutName = $app->input->getWord("layout", "default");
			}
			
			
			$app->input->set("view", $viewName);
			
// 			echo "Hello World";
			
			$paths = new SplPriorityQueue();
			$paths->insert(JPATH_COMPONENT_SITE . "/views/" . $viewName . "/tmpl", "normal");
			
			$viewClass = "JbizmapViews" . ucfirst($viewName) . ucfirst($viewFormat);
			
			
			$modelClass = "JbizmapModels" . ucfirst($viewName);
			
			$view = new $viewClass(new $modelClass(), $paths);
			
			$view->setLayout($layoutName);
			
			echo $view->render();
			
		}
	}