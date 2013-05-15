<?php
/**
 * Browser identifaction class
 *
 * This class handles various details about the user's 
 * browser agent.
 *
 * @package BROWSER
 * @author Benjamin Krein <superbenk@superk.org>
 */
class Browser_Agent
{
	var $_agent;
	
	/**
	 * Constructor method
	 * 
	 * Defines the current user agent
	 */
	function Browser_Agent()
	{
		if(stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')||stristr($_SERVER['HTTP_USER_AGENT'], 'Internet Explorer')) {
			$this->_agent = 'msie';
		} elseif(stristr($_SERVER['HTTP_USER_AGENT'], 'Opera')) {
			$this->_agent = 'opera';
		} elseif(stristr($_SERVER['HTTP_USER_AGENT'], 'Mozilla')) {
			$this->_agent = 'mozilla';
		}
	}
	
	/**
	 * Returns the current user agent
	 * 
	 * @return string Current user agent
	 */
	 function getAgent()
	 {
	 	return $this->_agent;
	 }
}
?>