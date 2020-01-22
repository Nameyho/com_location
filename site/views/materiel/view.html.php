<?php


// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class LocationViewMateriel extends JViewLegacy
{

    protected $form = null;
    protected $canDo;


    public function display($tpl = null)
    {
        // Get the form to display
        $this->form = $this->get('Form');
        // Get the javascript script file for client-side validation
        $this->script = $this->get('Script');


        $this->canDo = JHelperContent::getActions('com_location');
        if (!($this->canDo->get('core.create')))
        {
            $app = JFactory::getApplication();
            $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
            $app->setHeader('status', 403, true);
            return;
        }

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors), 500);
        }

        // Call the parent display to display the layout file
        parent::display($tpl);

        // Set properties of the html document
        $this->setDocument();
    }

    /**
     * Method to set up the html document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('Création de reservation'));
        $document->addScript(JURI::root() . $this->script);
        $document->addScript(JURI::root() . "/administrator/components/com_materiel"
            . "/views/materiel/submitbutton.js");
        JText::script('Erreur d\'enregistrement');
    }










}