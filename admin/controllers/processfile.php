<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	defined('_JEXEC') or die('Restricted access');
	
	jimport("phpexcel.library.PHPExcel");
	
	class JbizmapControllersProcessfile extends JControllerBase {
		
		
		public function execute(){
			$app = $this->getApplication();
			
			$document = JFactory::getDocument();
			
			$task = $app->input->getWord("task", "processfile");
			
			if($task == "processfile"){
				
				$ids = $app->input->get("cid", array(), "array");
				
				$modelName  = $app->input->get('model', 'Bizfile');
				
				$modelName  = 'JbizmapModels'.ucwords($modelName);
				
				$model = new $modelName();
				
				
				foreach($ids as  $id){
					$model->set("_biz_file_id", $id);
					$bizFile = $model->getItem();
					
					echo "<pre>";
					var_dump($bizFile);
					echo "</pre>";

					$this->uploadDataToDb($bizFile);
				}
			
			}	
			
			$app->redirect(JRoute::_('index.php?option=com_jbizmap'));
			return $return;
				
			
		}
		
		public function uploadDataToDb($bizFile){
			$nameParts = explode(".", $bizFile->biz_file_name);
			$fileName = $nameParts[0];
			$fileExt = $nameParts[1];
			
			if($fileExt == "csv"){
				echo "Its a csv";
			}else if($fileExt == "xlsx"){
				echo "Its an excel file";
				
				$filePath = JPATH_COMPONENT_ADMINISTRATOR . "/assets/" . $bizFile->biz_file_name;
				$objPHPExcel = PHPExcel_IOFactory::load($filePath);
				$sheet = $objPHPExcel->getActiveSheet();
				
				echo "Data Dimension: " . $sheet->calculateWorksheetDataDimension() . "<br />";
				echo "Highest Row: " . $sheet->getHighestRow() . "<br />";
				echo "Highest Col: " . $sheet->getHighestColumn() . "<br />";
				
				$totalRows = $sheet->getHighestRow();
				
				
				//bizname bizaddress bizloclat bizloclng bizphone bizemail bizwebsite bizcategory bizdescription bizcontactname
				for($row = 2; $row <= $totalRows; $row++){
					$data['bizname'] = $sheet->getCellByColumnAndRow(0, $row)->getValue();
					
					$data['bizaddress'] = $sheet->getCellByColumnAndRow(1, $row)->getValue();
					$data['bizloclat'] = $sheet->getCellByColumnAndRow(2, $row)->getValue();
					$data['bizloclng'] = $sheet->getCellByColumnAndRow(3, $row)->getValue();
					$data['bizphone'] = $sheet->getCellByColumnAndRow(4, $row)->getValue();
					$data['bizemail'] = $sheet->getCellByColumnAndRow(5, $row)->getValue();
					$data['bizwebsite'] = $sheet->getCellByColumnAndRow(6, $row)->getValue();
					$data['bizcategory'] = $sheet->getCellByColumnAndRow(7, $row)->getValue();
					$data['bizdescription'] = $sheet->getCellByColumnAndRow(8, $row)->getValue();
					$data['bizcontactname'] = $sheet->getCellByColumnAndRow(9, $row)->getValue();

					$data['table'] = 'biz';

					echo "<pre>";
					var_dump($data);
					echo "</pre>";
					
					$model = new JbizmapModelsBiz();
					
					if ( $returnedRow = $model->store($data) ){
						
						$return['success'] = true;
					}else{
						$return['msg'] = JText::_('COM_JBIZMAP_SAVE_FAILURE');
					}
					
					
					
					
					
					echo "Returned: <br />";
					echo "<pre>";
					var_dump($return);
					var_dump($returnedRow);
					echo "</pre>";
				}
			}
		}
	}