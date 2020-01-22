<?php
defined('_JEXEC') or die;


class LocationViewMateriels extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{

		$this->items		= $this->get('Items');

		// What Access Permissions does this user have? What can (s)he do?
        $this->canDo = JHelperContent::getActions('com_location');


		MaterielsHelper::addSubmenu('location');

		if (count($errors = $this->get('_errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		//var_dump($this);
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$canDo	= MaterielsHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('Liste : locations '), '');

		JToolbarHelper::addNew('materiel.add');

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('materiel.edit');
			JToolbarHelper::deleteList($msg='êtes vous sur ?','materiels.delete');
		}
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_location');
		}
	}
}
class MaterielsHelper
{
    public static function getActions($categoryId = 0)
    {
        $user	= JFactory::getUser();
        $result	= new JObject;

        if (empty($categoryId))
        {
            $assetName = 'com_location';
            $level = 'component';
        }
        else
        {
            $assetName = 'com_location.category.'.(int) $categoryId;
            $level = 'category';
        }

        $actions = JAccess::getActions('com_location', $level);

        foreach ($actions as $action)
        {

            $result->set($action->name,	$user->authorise($action->name, $assetName));
        }

        return $result;
    }

    public static function addSubmenu($vName = 'materiels')
    {

        JHtmlSidebar::addEntry(
            JText::_('Matériels'),
            'index.php?option=com_location&view=materiels',
            $vName == 'materiels'
        );
        JHtmlSidebar::addEntry(
        JText::_('Location'),
        'index.php?option=com_location&view=locations',
        $vName =='location'
    );
        JHtmlSidebar::addEntry(
            JText::_('Tranches Horaire'),
            'index.php?option=com_location&view=tranches',
            $vName =='tranche'
        );



    }}