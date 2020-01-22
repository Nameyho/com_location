<?php

//ceci sera au début de chaque page php
//elle permet d'empêcher de lancer la page PHP
//directement
defined('_JEXEC') or die;

//ici on va vérifier si l'utilisateur à la permission d'accèder au
//composant si ce n'est pas le cas alors il sera rediger vers
// une page 404 avec un message d'erreur

if (!JFactory::getUser()->authorise('core.manage', 'com_location'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

//ici on va créer une instance de JcontrollerLegacy
// et aura comment arguments le nom de composant

$controller	= JControllerLegacy::getInstance('Location');

//Comme ce n'est pas qu'une seule page qui sera lancer il faudra lancer
//un tache qui dira au composant quoi faire a chaques étapes
$controller->execute(JFactory::getApplication()->input->get('task'));

//redirection vers la prochaine url
$controller->redirect();