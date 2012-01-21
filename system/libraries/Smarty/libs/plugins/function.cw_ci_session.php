<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty {cw_ci_session} function plugin
 *
 * Type:     function<br>
 * Name:     cw_ci_session<br>
 * Purpose:  bridge to code igniter session properties
 * @author penn
 * @param array Format:
 * <pre>
 * array(
 *   'name' => required name of the session properties
 *   'type' => optional type 'userdata' or 'flashdata' - defaults to 'userdata'
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_cw_ci_session($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	$_name = isset($params['name']) ? $params['name'] : '';
	$_type = isset($params['type']) ? $params['type'] : 'userdata';
	if ($_name != '') {
		// get a Code Igniter instance
		$CI = &get_instance();
		$value = '';
		if ($_type == 'userdata') {
			$value = $CI -> session -> userdata($_name);
		} else if ($_type == 'flashdata')// flash
		{
			$value = $CI -> session -> flashdata($_name);
		} else {
			die("cw_ci_session: invalid type!");
		}
		echo $value;
	}
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$smarty -> _smarty_debug_info[] = array('type' => 'config', 'filename' => $_file . ' [' . $_section . '] ' . $_scope, 'depth' => $smarty -> _inclusion_depth, 'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
	}
}

/* vim: set expandtab: */
?>
