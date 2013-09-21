<?php

class JbizmapViewsAddHtml extends JViewHtml{
	public function render(){
		// I want to display a list of items here.

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