<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class JbizmapViewsBizHtml extends JViewHtml{
	var $id = null;
	var $item = null;
	public function render(){

		$model = new JbizmapModelsBiz();
		$this->item = $model->getItem();
		
		$this->id = JFactory::getApplication()->input->get("id");
		
		//$this->addToolBar();
		return parent::render();
	}
	
	public function addToolBar(){
		$bar = JToolbar::getInstance('toolbar');
		
		
		JToolbarHelper::custom("showmap", "", "", "Show Map", false);
		JToolbarHelper::addNew();
		JToolbarHelper::deleteList("Are you sure you want to delete the selected items?");
		
		//JToolbarHelper::custom("Show Map", "", "", "Show Map");
		JToolbarHelper::preferences("com_jbizmap");
	}
	
	
}