<?php
/**
 * Smarty plugin
 */
/**
 * Smarty {url} function plugin
 *
 * Type:     function
 * Name:     url
 * @author:  Trimo
 * @mail:     trimo.1992[at]gmail[dot]com
 */
function smarty_function_url($params, &$smarty) {
	if (!function_exists('current_url')) {
		if (!function_exists('get_instance')) {
			die("url: Cannot load CodeIgniter");
		}
		$CI = &get_instance();
		$CI -> load -> helper('url');
	}
	if (isset($params['type']) && $params['type'] == 'string')
		return uri_string();
	elseif (isset($params['type']) && $params['type'] == 'anchor' && isset($params['url']))
		return anchor($params['url'], $params['text'], $params['attr']);
	elseif (isset($params['type']) && $params['type'] == 'safemail' && isset($params['url']))
		return safe_mailto($params['url'], $params['text'], $params['attr']);
	elseif (isset($params['type']) && $params['type'] == 'mail' && isset($params['url']))
		return mailto($params['url'], $params['text'], $params['attr']);
	elseif (isset($params['type']) && $params['type'] == 'autolink' && isset($params['url']))
		return auto_link($params['url'], (isset($params['mode'])) ? $params['mode'] : 'both', ($params['new'] == 1) ? TRUE : FALSE);
	elseif (isset($params['type']) && $params['type'] == 'urltitle' && isset($params['title']))
		return url_title($params['title'], (isset($params['mode'])) ? $params['mode'] : 'dash', ($params['lower'] == 1) ? TRUE : FALSE);
	elseif (isset($params['type']) && $params['type'] == 'prep' && isset($params['url']))
		return prep_url($params['url']);
	elseif (isset($params['type']) && $params['type'] == 'current')
		return current_url();
	elseif (isset($params['type']) && $params['type'] == 'site')
		return site_url($params['url']);
	else
		return base_url();
}
?> 