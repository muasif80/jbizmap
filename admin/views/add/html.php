<?php

class JbizmapViewsAddHtml extends JViewHtml{
	
	var $item = null;
	
	public function render(){
		// I want to display a list of items here.
		$app = JFactory::getApplication();
		$id = $app->input->getInt("id", null);
		
		if(isset($id)){
			$model = new JbizmapModelsBiz();
			$this->item = $model->getItem();
		}else{
			$this->item = null;
		}
		
		$this->addToolBar();	
		
		return parent::render();
	}
	
	public function addToolBar(){
		$bar = JToolbar::getInstance('toolbar');
		JToolbarHelper::save("save");
		JToolbarHelper::cancel("cancel");
	
		//JToolbarHelper::custom("Show Map", "", "", "Show Map");
		JToolbarHelper::preferences("com_jbizmap");
	}
	
}