<?php
/**
* @copyright Copyright (C) 2008 Fiji Web Design. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @author gabe@fijiwebdesign.com
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Example Content Plugin
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 		1.5
 */
class plgContentBotphp_content extends JPlugin
{

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param object $subject The object to observe
	 * @param object $params  The object that holds the plugin parameters
	 * @since 1.5
	 */
	function plgContentBotphp_content( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}

	/**
	 * Example prepare content method
	 *
	 * Method is called by the view
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 */
	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;
		
		$php = str_replace('<br />', "", $this->params->def('onprepare_php'));
		eval("\r\n?>\r\n ".$php."\r\n<?php\r\n");
	
		return true;

	}

	/**
	 * Example after display title method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onAfterDisplayTitle( &$article, &$params, $limitstart )
	{

		$php = str_replace('<br />', "", $this->params->def('aftertitle_php'));
		
		if (ob_get_length()) {
			$content = ob_get_contents();
			ob_clean();
			eval("\r\n?>\r\n ".$php."\r\n<?php\r\n");
			$eval_contents = ob_get_contents();
			ob_clean();
			echo $content;
			
			return $eval_contents;
		}
	}

	/**
	 * Example before display content method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onBeforeDisplayContent( &$article, &$params, $limitstart )
	{
		$php = str_replace('<br />', "", $this->params->def('beforecontent_php'));
		
		if (ob_get_length()) {
			$content = ob_get_contents();
			ob_clean();
			eval("\r\n?>\r\n ".$php."\r\n<?php\r\n");
			$eval_contents = ob_get_contents();
			ob_clean();
			echo $content;
			
			return $eval_contents;
		}
	}

	/**
	 * Example after display content method
	 *
	 * Method is called by the view and the results are imploded and displayed in a placeholder
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onAfterDisplayContent( &$article, &$params, $limitstart )
	{
		$php = str_replace('<br />', "", $this->params->def('aftercontent_php'));
	
		if (ob_get_length()) {
			$content = ob_get_contents();
			ob_clean();
			eval("\r\n?>\r\n ".$php."\r\n<?php\r\n");
			$eval_contents = ob_get_contents();
			ob_clean();
			echo $content;
			
			return $eval_contents;
		}
	}
}



?>