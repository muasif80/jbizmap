<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class JbizmapViewsDefaultHtml extends JViewHtml{
	var $pagination = null;
	
	var $sortColumn = null;
	var $sortDirection = null;

	var $id = null;
	
	public function render(){
		// I want to display a list of items here.
		//$this->pagination = $this->get("Pagination");
// 		JPagination

		
		
		$bizModel = new JbizmapModelsBiz();		
		$this->bizlist = $bizModel->listItems();
			
		//$this->addBizList();
		
		//$this->pagination = new JPagination($bizModel->getTotal(), $bizModel->get("limitstart"), $bizModel->get("limit"));

		//$this->pagination = $bizModel->get("Pagination");
		
		$this->pagination = $bizModel->getPagination();
		
		$this->sortColumn = $bizModel->get('sortCol');
		$this->sortDirection = $bizModel->get('sortDir');
		
		$this->id = JFactory::getApplication()->input->get("id");
		
// 		$this->pagination->
		
// 		$this->addToolBar();
		return parent::render();
	}
}