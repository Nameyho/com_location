<?php
defined('_JEXEC') or die;

class LocationModelLocation extends JModelAdmin
{
    protected $text_prefix = 'COM_LOCATION';

    //on va rechercher le fichier dans le dossier table qui est utilisée pour lire et écrire dans
    //la base de donnée
    public function getTable($type = 'Location', $prefix = 'LocationTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    //ici on récupére le formulaire dans lequel sont défini les champs
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
    //ici il va charger les données dans le formulaire notamment lors de la modification d'un champ
    // dans la base de données
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
      //  $table->id		= htmlspecialchars_decode($table->idloue, ENT_QUOTES);
    }
}