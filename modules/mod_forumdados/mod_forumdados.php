<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/getHelper.php';

$dataForum = array();

if($params->get('datatype') == 1 && !$params->get('aleatorio',0)){
	$dataForum = ModGetHelper::getTotalTutorials();	
}

if($params->get('datatype') == 2 && !$params->get('aleatorio',0)){
	$dataForum = ModGetHelper::getSolutions();	
}

if($params->get('datatype') == 3 && !$params->get('aleatorio',0)){
	$dataForum = ModGetHelper::getDevices();	
}

if($params->get('datatype') == 4 && !$params->get('aleatorio',0)){
	$dataForum = ModGetHelper::getPercent();	
}

require JModuleHelper::getLayoutPath('mod_forumdados', $params->get('layout', 'default'));
