<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty {cw_ci_site_url} function plugin
 *
 * Type:     function<br>
 * Name:     cw_ci_site_url<br>
 * Purpose:  bridge to code igniter site_url
 * @author penn
 * @param array Format:
 * <pre>
 * array(
 *   'path' => required path
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_cw_ci_site_url($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	if (!function_exists('site_url')) {
		die("cw_ci_site_url: url helper not loaded in CodeIgniter");
	}
	$_path = isset($params['path']) ? $params['path'] : '';
	if ($_path != '') {
		if (substr($_path, 0, 1) == '$') {
			$_path = $smarty -> get_template_vars(substr($_path, 1));
		}
		echo site_url($_path);
	}
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$smarty -> _smarty_debug_info[] = array('type' => 'config', 'filename' => $_file . ' [' . $_section . '] ' . $_scope, 'depth' => $smarty -> _inclusion_depth, 'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
	}
}

/* vim: set expandtab: */
?>
