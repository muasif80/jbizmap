<?php
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
	// no direct access
	defined('_JEXEC') or die('Restricted access');
	
	class JbizmapModelsBizcity extends JbizmapModelsDefault{
		
		function __construct(){
			
			$app = JFactory::getApplication();
		
			parent::__construct();
		}
		
		protected function _buildQuery(){
			
			$db = JFactory::getDBO();
			$query = $db->getQuery(TRUE);

			$query->select('distinct b.bizcity');
			$query->from('#__jbizmap_biz as b');
			$query->where("b.bizcity <> '' AND b.bizcity IS NOT NULL");
			$query->order("b.bizcity asc");
			
			return $query;
		}
		
		public function listItems(){
			$query = $this->_buildQuery();
		
			$list = parent::_getList($query, 0, 0);
		
			return $list;
		}
	}