<?php
defined('_JEXEC') or die;

class LocationHelper
{
    public static function getActions($categoryId = 0)
    {
        $user	= JFactory::getUser();
        $result	= new JObject;

        if (empty($categoryId))
        {
            $assetName = 'com_materiel';
            $level = 'component';
        }
        else
        {
            $assetName = 'com_materiel.category.'.(int) $categoryId;
            $level = 'category';
        }

        $actions = JAccess::getActions('com_materiel', $level);

        foreach ($actions as $action)
        {
            $result->set($action->name,	$user->authorise($action->name, $assetName));
        }

        return $result;
    }


	public static function addSubmenu($vName = 'materiels')
    {

        JHtmlSidebar::addEntry(
            JText::_('matériels'),
            'index.php?option=com_materiel&view=materiels',
            $vName == 'materiels'
        );
        JHtmlSidebar::addEntry(
            JText::_('catégories'),
            'index.php?option=com_categories&extension=com_materiel',
            $vName =='categories'
        );
        if ($vName =='categories')
        {
            JToolbarHelper::title(
                JText::_('Catégories',
                    JText::_('com_materiel')),
                'materiels-categories');
        }


    }}