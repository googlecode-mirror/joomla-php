<?php

/**
 * @author gabe@fijiwebdesign.com
 * @copyright (c) fijiwebdesign.com
 * @license http://www.fijiwebdesign.com/
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( $mainframe->getPath( 'toolbar_html' ) );

switch($task) {
	case 'index':
	admin_php_toolbar_html::index();
	break;
	case 'edit':
	admin_php_toolbar_html::edit();
	break;
	case 'add':
	admin_php_toolbar_html::add();
	break;
	case 'del':
	admin_php_toolbar_html::del();
	break;
	case 'help':
	admin_php_toolbar_html::help();
	break;
	default:
	admin_php_toolbar_html::about();
	break;
}

?>