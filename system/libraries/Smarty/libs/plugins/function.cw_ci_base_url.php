<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty {cw_ci_base_url} function plugin
 *
 * Type:     function<br>
 * Name:     cw_ci_base_url<br>
 * Purpose:  bridge to code igniter base_url
 * @author penn
 * @param array Format:
 * <pre>
 * array(
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_cw_ci_base_url($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	if (!function_exists('base_url')) {
		die("cw_ci_base_url: url helper not loaded in CodeIgniter");
	}
	echo base_url();
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$smarty -> _smarty_debug_info[] = array('type' => 'config', 'filename' => $_file . ' [' . $_section . '] ' . $_scope, 'depth' => $smarty -> _inclusion_depth, 'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
	}
}

/* vim: set expandtab: */
?>
