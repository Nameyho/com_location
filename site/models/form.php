<?php
defined('_JEXEC') or die;

class LocationModelForm extends JModelAdmin
{

    public function getTable($type = 'Location', $prefix = 'LocationTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm(
            'com_location.form',
            'location',
            array(
                'control' => 'jform',
                'load_data' => $loadData
            )
        );

        if (empty($form))
        {
            $errors = $this->getErrors();
            throw new Exception(implode("\n", $errors), 500);
        }

        return $form;
    }


    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_location.edit.location.data',
            array()
        );

        return $data;
    }


}
