<?php

	class JbizmapControllersAdd extends JControllerBase {
		
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
			$task = $app->input->getWord("task", "add");
			
			if($task == "save"){
				
				$bizName = $app->input->getString("bizname");
				
				
				
				$modelName  = $app->input->get('model', 'Biz');
				
				$modelName  = 'JbizmapModels'.ucwords($modelName);
				
				$model = new $modelName();
				if ( $row = $model->store() )
				{
					$return['success'] = true;
					//$return['msg'] = JText::_('COM_LENDR_SAVE_SUCCESS');
				
					//$return['html'] = LendrHelpersView::getHtml($view, $layout, $item, $row);
				
				}else{
					$return['msg'] = JText::_('COM_JBIZMAP_SAVE_FAILURE');
				}
				
				//echo json_encode($return);
				
				
				
				
				echo $bizName;
				
				$viewName = $app->input->getWord("view", "default");
				$viewFormat = $document->getType();
				$layoutName = $app->input->getWord("layout", "default");
				
				$app->input->set("view", $viewName);
				
				$paths = new SplPriorityQueue();
				$paths->insert(JPATH_COMPONENT . "/views/" . $viewName . "/tmpl", "normal");
				
				$viewClass = "JbizmapViews" . ucfirst($viewName) . ucfirst($viewFormat);
				
				
				$modelClass = "JbizmapModels" . ucfirst($viewName);
				
				$view = new $viewClass(new $modelClass(), $paths);
				
				$view->setLayout($layoutName);
				
				
				
				$app->redirect(JRoute::_('index.php?option=com_jbizmap'));
				return $return;
				
			}else{
			
				$viewName = $app->input->getWord("view", "default");
				$viewFormat = $document->getType();
				$layoutName = $app->input->getWord("layout", "default");
				
				$app->input->set("view", $viewName);
				
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