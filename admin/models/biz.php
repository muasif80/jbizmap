<?php
	class JbizmapModelsBiz extends JbizmapModelsDefault{
		var $_biz_id;
		
		var $_biz_category = null;
		var $_biz_city = null;
		
		var $_bizname;
		
		var $_bizloclat = null;
		
		var $_bizloclng = null;
		
		
		function __construct(){
			
			$app = JFactory::getApplication();
			$this->_biz_id = $app->input->get('id', null);
			$this->_biz_category = $app->input->getString('selected_category', null);
			$this->_biz_city = $app->input->getString('selected_city', null);
				
			
		
			parent::__construct();
		}
		
		protected function _buildQuery(){
			
			$db = JFactory::getDBO();
			$query = $db->getQuery(TRUE);
		
			$query->select('b.biz_id, b.bizname, b.bizloclat, b.bizloclng, b.bizaddress, b.bizcontactname, b.bizphone, b.bizemail, b.bizcategory, b.bizwebsite, b.bizdescription, b.bizcity, b.bizstate');
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
			
// 			echo $this->_biz_category;
// 			exit;
			if(is_string($this->_biz_category) && !empty($this->_biz_category)){
				$query->where("b.bizcategory like '" . $this->_biz_category . "'");
			}
			
			if(is_string($this->_biz_city) && !empty($this->_biz_city)){
				$query->where("b.bizcity like '" . $this->_biz_city . "'");
			}
			
// 			echo "<pre>";
// 			var_dump($query);
// 			echo "</pre>";
// 			exit;
			
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