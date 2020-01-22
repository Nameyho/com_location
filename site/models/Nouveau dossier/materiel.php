<?php
defined('_JEXEC') or die;

class LocationModelMateriel extends JModelAdmin
{
    protected $text_prefix = 'COM_MATERIEL';

    public function getTable($type = 'Materiel', $prefix = 'MaterielTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $app = JFactory::getApplication();

        $form = $this->loadForm('com_materiel.materiel', 'materiel', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_materiel.edit.materiel.data', array());

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