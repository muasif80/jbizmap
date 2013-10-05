<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	defined('_JEXEC') or die('Restricted access');
	
	class JbizmapControllersDisplay extends JControllerBase {
		
		//var $id = null;
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
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
			}else if($task == 'filter_by_category'){
				//echo "here";
				//$category = $app->input->getWord("selected_category", "-1");
				$layoutName = $app->input->getWord("layout", "default");
				//$this->id = $app->input->getInt("id");
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