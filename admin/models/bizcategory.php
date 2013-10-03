<?php
	class JbizmapModelsBizcategory extends JbizmapModelsDefault{
		
		function __construct(){
			
			$app = JFactory::getApplication();
		
			parent::__construct();
		}
		
		protected function _buildQuery(){
			
			$db = JFactory::getDBO();
			$query = $db->getQuery(TRUE);

			$query->select('distinct b.bizcategory');
			$query->from('#__jbizmap_biz as b');
			$query->where("b.bizcategory <> '' AND b.bizcategory IS NOT NULL");
			$query->order("b.bizcategory asc");
			
			return $query;
		}
		
		public function listItems(){
			$query = $this->_buildQuery();
		
			$list = parent::_getList($query, 0, 0);
		
			return $list;
		}
	}