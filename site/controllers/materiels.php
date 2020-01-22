<?php
defined('_JEXEC') or die;

class LocationControllerMateriels extends JControllerForm
{
    public function getModel($name = 'Location', $prefix = 'MaterielModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}