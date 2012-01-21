<?php
/**
 * Smarty plugin
 */
/**
 * Smarty {cw_ci_create_links} function plugin
 *
 * Type:     function
 * Name:     cw_ci_create_links
 * @author:  Penn
 */
function smarty_function_cw_ci_create_links($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	$CI = &get_instance();
	if (!is_callable(array($CI -> pagination, "create_links"))) {
		die("pagination: pagination not loaded in CI");
	}
	echo $CI -> pagination -> create_links();
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$smarty -> _smarty_debug_info[] = array('type' => 'config', 'filename' => $_file . ' [' . $_section . '] ' . $_scope, 'depth' => $smarty -> _inclusion_depth, 'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
	}
}
?> 