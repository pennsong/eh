<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifier
 */
/**
 * Smarty checkNull modifier plugin
 *
 * Type:     modifier
 * Name:     replace
 * Purpose:  check varialbe whether is defined before display, if undefined display ''
 *
 * @author penn
 * @param var $var  input variable
 * @return string
 */
function smarty_modifier_checkNull(&$var) {
	if (isset($var)) {
		return $var;
	} else {
		return '';
	}
}
?>