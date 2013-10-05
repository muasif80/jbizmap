<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	defined('_JEXEC') or die('Restricted access');
	
	class JbizmapControllersDelete extends JControllerBase {
		
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
			$task = $app->input->getWord("task", "remove");
			
			
			if($task == "remove"){
				
				$ids = $app->input->get("cid", array(), "array");
				
				/*
				echo "<pre>";
				//var_dump($app->input);
				
				var_dump($recordIds);
				echo "</pre>";
				
				//exit;
				*/
				
				
				$modelName  = $app->input->get('model', 'Biz');
				
				$modelName  = 'JbizmapModels'.ucwords($modelName);
				
				$model = new $modelName();
				
				
				foreach($ids as  $id){
					$model->delete($id);
					
				}
				
				/*
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
				*/
				
			}
			
			$app->redirect(JRoute::_('index.php?option=com_jbizmap'));
			return $return;
			
		}
	}