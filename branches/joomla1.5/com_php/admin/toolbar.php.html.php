<?php

/**
 * @author gabe@fijiwebdesign.com
 * @copyright (c) fijiwebdesign.com
 * @license http://www.fijiwebdesign.com/
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Toolbar HTML
*/
class admin_php_toolbar_html {
	
	function index() {
		JToolBarHelper::addNew('new');
		JToolBarHelper::editList('edit', 'Edit');
		JToolBarHelper::deleteList(' ', 'delete', 'Remove');
		JToolBarHelper::spacer();
	}
	
	function edit() {
		JToolBarHelper::save('apply', 'apply', 'Apply');
		JToolBarHelper::save('save', 'save', 'Save');
		JToolBarHelper::spacer();
	}
	
	function add() {
		JToolBarHelper::save(' ', 'save', 'Save');
		JToolBarHelper::spacer();
	}
	
	function del() {
		JToolBarHelper::save(' ', 'save', 'Save');
		JToolBarHelper::spacer();
	}

	function about() {

	}
	
	function help() {

	}
}




?>
