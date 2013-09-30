<?php

	jimport('joomla.filesystem.file');
	jimport('joomla.filesystem.folder');

	class JbizmapControllersAddbulk extends JControllerBase {
		
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
			//echo "Hello World Addbulk";
			
			$task = $app->input->getWord("task", "addbulk");
			
			if($task == "save"){
				//echo "Its a save request - process the excel file now";
// 				echo "<pre>";
// 				var_dump($_FILES);
// 				echo "</pre>";
				
// 				ini_set("display_errors", 1);
				JFile::upload($_FILES["bizFile"]["tmp_name"], JPATH_COMPONENT_ADMINISTRATOR . "/assets/" . $_FILES["bizFile"]["name"]);
				
				
				/* Storing the data */
				//$bizName = $app->input->getString("bizname");
				
				
				
				$modelName  = $app->input->get('model', 'Bizfile');
				
				$modelName  = 'JbizmapModels'.ucwords($modelName);
				
				$app->input->set("biz_file_name", $_FILES["bizFile"]["name"]);
				
				$model = new $modelName();
				//$model->biz_file_name = "hellofile";
				$_POST['biz_file_name'] = $_FILES["bizFile"]["name"];
				
				if ( $row = $model->store() )
				{
					$return['success'] = true;
					//$return['msg'] = JText::_('COM_LENDR_SAVE_SUCCESS');
				
					//$return['html'] = LendrHelpersView::getHtml($view, $layout, $item, $row);
				
				}else{
					$return['msg'] = JText::_('COM_JBIZMAP_SAVE_FAILURE');
				}
				/* */
				
				
				$viewName = $app->input->getWord("view", "addbulk");
				$viewFormat = $document->getType();
				$layoutName = $app->input->getWord("layout", "default");
				
				$app->input->set("view", $viewName);
				
				// 				echo "View: " . $viewName . ", viewFormat: " . $viewFormat . ", layoutName: " . $layoutName;
				
				$paths = new SplPriorityQueue();
				$paths->insert(JPATH_COMPONENT . "/views/" . $viewName . "/tmpl", "normal");
				
				$viewClass = "JbizmapViews" . ucfirst($viewName) . ucfirst($viewFormat);
				
				
				$modelClass = "JbizmapModels" . ucfirst($viewName);
				
				$view = new $viewClass(new $modelClass(), $paths);
				
				$view->setLayout($layoutName);
			}else{
			
				$viewName = $app->input->getWord("view", "addbulk");
				$viewFormat = $document->getType();
				$layoutName = $app->input->getWord("layout", "default");
				
				$app->input->set("view", $viewName);
				
// 				echo "View: " . $viewName . ", viewFormat: " . $viewFormat . ", layoutName: " . $layoutName;
				
				$paths = new SplPriorityQueue();
				$paths->insert(JPATH_COMPONENT . "/views/" . $viewName . "/tmpl", "normal");
				
				$viewClass = "JbizmapViews" . ucfirst($viewName) . ucfirst($viewFormat);
				
				
				$modelClass = "JbizmapModels" . ucfirst($viewName);
				
				$view = new $viewClass(new $modelClass(), $paths);
				
				$view->setLayout($layoutName);
			}
			
			echo $view->render();
		}
	}