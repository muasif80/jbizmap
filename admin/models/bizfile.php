<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	// no direct access
	defined('_JEXEC') or die('Restricted access');

	class JbizmapModelsBizfile extends JbizmapModelsDefault{
		var $_biz_file_id;
		public $_biz_file_name;
		
		function __construct(){
			
			$app = JFactory::getApplication();
			$this->_biz_file_id = $app->input->get('id', null);
		
			parent::__construct();
		}
		
		protected function _buildQuery(){
				
			$db = JFactory::getDBO();
			$query = $db->getQuery(TRUE);
		
			$query->select('b.biz_file_id, b.biz_file_name');
			$query->from('#__jbizmap_biz_file as b');
			//$query->order("b." . $this->sortCol . " " . $this->sortDir);
		
				
			return $query;
		}
		
		/**
		 * Builds the filter for the query
		 * @param    object  Query object
		 * @return   object  Query object
		 *
		 */
		protected function _buildWhere(&$query){
		
			if(is_numeric($this->_biz_file_id)){
				$query->where('b.biz_file_id = ' . (int) $this->_biz_file_id);
			}
				
			return $query;
		}
		
		
		public function getItem()
		{
			$biz = parent::getItem();
			return $biz;
		}
		
		public function delete($id){
				
			$db = & JFactory::getDBO();
		
			$query = $db->getQuery(true);
				
			$query->delete("#__jbizmap_biz_file")->where("biz_file_id=" . $id);
		
			$db->setQuery($query);
			$result = $db->execute();
			 
			return $result;
		}
	}