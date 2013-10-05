<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

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