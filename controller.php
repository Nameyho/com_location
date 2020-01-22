<?php
defined('_JEXEC') or die;

//tout d'abord nous allons faire hériter notre classe avec les fonction de JControllerLegacy

class LocationController extends JControllerLegacy
{

	//definition de la vue par défaite
	protected $default_view = 'locations';


	//ceci est la première fonction apellé par le controller
	public function display($cachable = false, $urlparams = false)
	{
		//appel du controler afin de vérifier si l'auteur a la permission
		require_once JPATH_COMPONENT.'/helpers/location.php';

		//ici on récupére les infos transmises dans l'URL afin de savoir quelle vue, quel layout et éventuellement quel id
		$view   = $this->input->get('view', 'locations');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');


		//ici on va empecher toute personne d'accéder directement a la vue edit 
		// la vue edit est la vue qui gére la création et modification 
		 if ($view == 'materiel' && $layout == 'edit' && !$this->checkEditId('com_location.edit.materiel', $id))
		 {
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
		 	$this->setMessage($this->getError(), 'error');
	 	$this->setRedirect(JRoute::_('index.php?option=com_location&view=materiels', false));

		 	return false;
		 }

		//on apelle la fonction de la classe parente
		parent::display();

		//et on retourne la valeur de la var
		return $this;
	}


	}