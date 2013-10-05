<?php 
/**
 *
 * @copyright   Copyright (C) 2013 & later Mayotitech. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */
defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class TableBizfile extends JTable
{                      
  /**
  * Constructor
  *
  * @param object Database connector object
  */
  function __construct( &$db ) {
    parent::__construct('#__jbizmap_biz_file', 'biz_file_id', $db);
  }
}