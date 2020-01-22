<?php
defined('_JEXEC') or die;

class LocationControllerLocations extends JControllerForm
{
    public function getModel($name = 'Location', $prefix = 'MaterielModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}