<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty {cw_ci_set_value} function plugin
 *
 * Type:     function<br>
 * Name:     cw_ci_set_value<br>
 * Purpose:  bridge to code igniter set_value
 * @author penn
 * @param array Format:
 * <pre>
 * array(
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_cw_ci_set_value($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	if (!function_exists('set_value')) {
		die("cw_ci_base_url: form helper not loaded in CodeIgniter");
	}
	$_name = isset($params['name']) ? $params['name'] : '';
	if ($_name != '') {
		if (substr($_name, 0, 1) == '$') {
			$_name = $smarty -> get_template_vars(substr($_name, 1));
		}
		echo set_value($_name);
	}
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$smarty -> _smarty_debug_info[] = array('type' => 'config', 'filename' => $_file . ' [' . $_section . '] ' . $_scope, 'depth' => $smarty -> _inclusion_depth, 'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
	}
}

/* vim: set expandtab: */
?>
