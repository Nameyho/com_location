<?php
defined('_JEXEC') or die;

class LocationModelLocation extends JModelAdmin
{
    protected $text_prefix = 'COM_LOCATION';

    public function getTable($type = 'Location', $prefix = 'LocationTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $app = JFactory::getApplication();

        $form = $this->loadForm('com_location.location', 'location', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_location.edit.location.data', array());

        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
     //   $table->idmat		= htmlspecialchars_decode($table->id, ENT_QUOTES);
    }
}