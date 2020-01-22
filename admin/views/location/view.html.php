<?php
defined('_JEXEC') or die;


class LocationViewLocation extends JViewLegacy
{
    protected $item;

    protected $form;

    public function display($tpl = null)
    {
        {
            $app = JFactory::getApplication();
            $jinput = $app->input;

            // on récupére les données
            $this->form = $this->get('Form');
            $this->item = $this->get('Item');
            $model = $this->getModel();


            //on vérifie si joomla n'a pas renvoyé d'erreur
            if (count($errors = $this->get('Errors'))) {
                  JError::raiseError(500, implode('<br />', $errors));

                return false;
            }

            // Ajout d'un menu avec les boutons de sauvegarder,etc..
            $this->addToolBar();

            // on affiche le template
            parent::display($tpl);


        }
    }
    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);

        //on ajoute le titre de la page
        JToolbarHelper::title(JText::_('Ajout de materiel'), '');

        //on crée un bouton de sauvegarde avec la fonction save qu'on a surchagé 
        JToolbarHelper::save($task='location.save');

        //ajout d'un bouton d'annulation
        if (empty($this->item->id))
        {
            JToolbarHelper::cancel('location.cancel');
        }
        else
        {
            JToolbarHelper::cancel('location.cancel', 'JTOOLBAR_CLOSE');
        }
    }
}