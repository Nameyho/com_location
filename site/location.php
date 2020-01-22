<?php
defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('Location');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();