<?php
defined('_JEXEC') or die;


class LocationViewTranche extends JViewLegacy
{
    protected $item;

    protected $form;

    public function display($tpl = null)
    {
        {
            $app        = JFactory::getApplication();
            $jinput = $app->input;

            // Get the Data
            $this->form = $this->get('Form');
            $this->item = $this->get('Item');
            $model = $this->getModel();


            // Check for errors.
            if (count($errors = $this->get('Errors')))
            {
              //  JError::raiseError(500, implode('<br />', $errors));

                return false;
            }

            // Set the toolbar
            $this->addToolBar();

            // Display the template
            parent::display($tpl);



        }
    }

    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);

        JToolbarHelper::title(JText::_('Ajout de location'), '');


        JToolbarHelper::save('tranche.save');

        if (empty($this->item->id))
        {
            JToolbarHelper::cancel('tranche.cancel');
        }
        else
        {
            JToolbarHelper::cancel('tranche.cancel', 'JTOOLBAR_CLOSE');
        }
    }
}