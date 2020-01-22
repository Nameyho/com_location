<?php
defined('_JEXEC') or die;

class LocationControllerTranches extends JControllerAdmin
{
    public function getModel($name = 'Tranche', $prefix = 'LocationModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}