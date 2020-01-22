<?php
defined('_JEXEC') or die;

class LocationControllerMateriels extends JControllerAdmin
{
    public function getModel($name = 'Materiel', $prefix = 'LocationModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}