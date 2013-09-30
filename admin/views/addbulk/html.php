<?php

class JbizmapViewsAddbulkHtml extends JViewHtml{
	public function render(){
		// I want to display a list of items here.

		$bizFileModel = new JbizmapModelsBizfile();
		$this->bizFileList = $bizFileModel->listItems();
			
		//$this->addBizList();
		
		//$this->pagination = new JPagination($bizModel->getTotal(), $bizModel->get("limitstart"), $bizModel->get("limit"));
		
		//$this->pagination = $bizModel->get("Pagination");
		
// 		$this->pagination = $bizModel->getPagination();
		
// 		$this->sortColumn = $bizModel->get('sortCol');
// 		$this->sortDirection = $bizModel->get('sortDir');
		
// 		$this->id = JFactory::getApplication()->input->get("id");
		
		
		$this->addToolBar();	
		
		return parent::render();
	}
	
	public function addToolBar(){
		$bar = JToolbar::getInstance('toolbar');
		JToolbarHelper::save("save");
		
		JToolbarHelper::cancel("cancel");
		
		JToolbarHelper::custom("processfile", "", "", "Process File", false);
		
	
		//JToolbarHelper::custom("Show Map", "", "", "Show Map");
		JToolbarHelper::preferences("com_jbizmap");
	}
	
}