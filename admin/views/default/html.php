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

		//$selected_category = JFactory::getApplication()->input->get("selected_category", "-1");
		
		
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

		/*
		 * Loading the Business Categories
		 */
		$bizCategoryModel = new JbizmapModelsBizcategory();
		$this->bizCategoryList = $bizCategoryModel->listItems();
		
		/*
		 * Loading the Business Categories
		*/
		$bizCityModel = new JbizmapModelsBizcity();
		$this->bizCityList = $bizCityModel->listItems();
		
		$this->addToolBar();
		return parent::render();
	}
	
	public function addToolBar(){
		$bar = JToolbar::getInstance('toolbar');
		
		
		JToolbarHelper::custom("showmap", "", "", "Show Map", false);
		JToolbarHelper::addNew();
		JToolbarHelper::custom("addbulk", "", "", "Add Bulk", false);
		JToolbarHelper::deleteList("Are you sure you want to delete the selected items?");
		
		//JToolbarHelper::custom("Show Map", "", "", "Show Map");
		JToolbarHelper::preferences("com_jbizmap");
	}
	
	
	public function addBizList(){
		
		$this->bizlist = array();
		
		$biz = new stdClass();
		$biz->name = "Twinkle Toys";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Minie Minie";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Shop & Shop";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Sarah Parlour";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "St. Michael";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Jadore";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Jhinga Lala Hur";
		$this->bizlist[] = $biz;
		
		$biz = new stdClass();
		$biz->name = "Cambridge";
		$this->bizlist[] = $biz;
		
	}
}