<?php
defined('_JEXEC') or die;

class com_locationInstallerScript
{
	function install($parent)
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_location');
	}

	function uninstall($parent)
	{
		echo '<p>' . JText::_('') . '</p>';
	}

	function update($parent)
	{
		echo '<p>' . JText::_('COM_MATERIEL_UPDATE_TEXT') . '</p>';
	}

	function preflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_MATERIEL_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	function postflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_MATERIEL_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}