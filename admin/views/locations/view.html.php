<?php
defined('_JEXEC') or die;

//on retrouve la même composition que pour le dossier location
class LocationViewLocations extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{

		$this->items		= $this->get('Items');

		// on vérifie si l'utilisateur peut avoir accés
        $this->canDo = JHelperContent::getActions('com_location');

        //ajout d'un sous-menu 
		MaterielsHelper::addSubmenu('location');

		if (count($errors = $this->get('_errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

        $this->addToolbar();
        //on affiche ceci pour afficher une barre latérale
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$canDo	= MaterielsHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('Liste : locations '), '');

        //ajout de bouton de location
		JToolbarHelper::addNew('location.add');

		if ($canDo->get('core.edit'))
		{
            JToolbarHelper::editList('location.edit');
            //suppresion du record ou des records de la base donnée
			JToolbarHelper::deleteList($msg='êtes vous sur ?','locations.delete');
		}
		if ($canDo->get('core.admin'))
		{
            //affichage du bouton préférences 
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

    // ce qui sera afficher dans le menu matériel
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