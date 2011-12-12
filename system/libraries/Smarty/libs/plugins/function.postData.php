<?php
/**
 * Smarty {postData} function plugin
 *
 * Type:     function
 * Name:     postData
 * Purpose:  echo a data from post maybe undefined, if undefined return ''
 * @author penn
 * @param array Format:
 * <pre>
 * array(
 *   'name' => required name of the post data
 * )
 * @param Smarty
 */
function smarty_function_postData($params, &$smarty) {
	$_name = isset($params['name']) ? $params['name'] : '';
	if ($_name != '') {
		if (!isset($_POST[$_name])) {
			$value = '';
		} else {
			$value = $_POST[$_name];
		}
		return $value;
	}
}

/* vim: set expandtab: */
?>
