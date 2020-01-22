<?php
defined('_JEXEC') or die;



class LocationModelLocations extends JModelList
{
	//le constructeur demandera tout les champs utilisé afin de créer sa configuration 
	// de requete on peut utiliser un alias mais il est plus facile de garder le même nom
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
                'id ','a.id',
			    'idmat', 'a.idmat',
                'nombre', 'a.nombre',
                'iduser','a.iduser',
                'idtranche','a.idtranche',
                'dateloc','a.dateloc'
			);
		}


		parent::__construct($config);
}

//ici on prépare la requete afin de récupérer les informations
//le nom de la table est précédée de #__ mais ceux-ci seront
//remplacés par joomla lors de la requêtes par le prefixe de 
//la table
	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);


		$query->select(
			$this->getState(
				'list.select',
               ' a.id,a.idmat,' .
                'a.nombres,a.iduser,a.idtranche,'.
                'a.dateloc'

			)
		);


		$query->from($db->quoteName('#__loue').' AS a');

		return $query;


    }
}