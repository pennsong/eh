<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty {cw_ci_validation_errors} function plugin
 *
 * Type:     function<br>
 * Name:     cw_ci_validation_errors<br>
 * Purpose:  bridge to code igniter validation_errors helper function
 * @author penn
 * @param array
 * <pre>
 * array(
 *   'assign' => optional variable to assign the error message to - defaults to output
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_cw_ci_validation_errors($params, &$smarty) {
	if ($smarty -> debugging) {
		$_params = array();
		require_once (SMARTY_CORE_DIR . 'core.get_microtime.php');
		$_debug_start_time = smarty_core_get_microtime($_params, $smarty);
	}
	if (!function_exists('validation_errors')) {
		die("cw_ci_validation_errors: url helper not loaded in CodeIgniter");
	}
	$_assign = isset($params['assign']) ? $params['assign'] : null;
	$value = validation_errors();
	if (isset($_assign)) {
		$smarty -> assign($_assign, $value);
	} else {
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
