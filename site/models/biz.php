<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	// no direct access
	defined('_JEXEC') or die('Restricted access');
	
	class JbizmapModelsBiz extends JbizmapModelsDefault{
		var $_biz_id;
		var $_bizname;
		
		var $_bizloclat = null;
		
		var $_bizloclng = null;
		
		
		function __construct(){
			
			$app = JFactory::getApplication();
			$this->_biz_id = $app->input->get('id', null);
			
			
		
			parent::__construct();
		}
		
		protected function _buildQuery(){
			
			$db = JFactory::getDBO();
			$query = $db->getQuery(TRUE);
		
			$query->select('b.biz_id, b.bizname, b.bizloclat, b.bizloclng, b.bizaddress, b.bizcontactname, b.bizphone, b.bizemail, b.bizcategory, b.bizwebsite, b.bizdescription');
			$query->from('#__jbizmap_biz as b');
			$query->order("b." . $this->sortCol . " " . $this->sortDir);
		
			
			return $query;
		}
		
		/**
		 * Builds the filter for the query
		 * @param    object  Query object
		 * @return   object  Query object
		 *
		 */
		protected function _buildWhere(&$query){
		
			if(is_numeric($this->_biz_id)){
				$query->where('b.biz_id = ' . (int) $this->_biz_id);
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
			
	        $query->delete("#__jbizmap_biz")->where("biz_id=" . $id);

	        $db->setQuery($query);
	        $result = $db->execute();
	        
	        return $result;
		}
		
	}