<?php
// no direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once( dirname(__FILE__) . '/helper.php' );

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_simplecallback', $params->get('layout', 'default'));
?>