<?php
defined('_JEXEC') or die;

class LocationTableLocation extends JTable
{
	//on construit la table en indiquant la table et la clef primaire
	public function __construct(&$db)
	{
		parent::__construct('#__loue', 'id', $db);
	}
	//on prépare les données
	public function bind($array, $ignore = '')
	{
		return parent::bind($array, $ignore);
	}
	//on stock les données
	public function store($updateNulls = false)
	{
		return parent::store($updateNulls);
	}
}