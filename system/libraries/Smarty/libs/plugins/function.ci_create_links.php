<?php
/**
 * Smarty plugin
 */
/**
 * Smarty {ci_create_links} function plugin
 *
 * Type:     function
 * Name:     ci_create_links
 * @author:  Penn
 */
function smarty_function_ci_create_links($params, &$smarty) {
	$CI = &get_instance();
	if (!is_callable(array($CI -> pagination, "create_links"))) {
		die("pagination: pagination not loaded in CI");
	}
	return $CI -> pagination -> create_links();
}
?> 