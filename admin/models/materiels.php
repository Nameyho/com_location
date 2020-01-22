<?php
defined('_JEXEC') or die;

class LocationModelMateriels extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
                'nom','a.nom',
                'nombre','a.nombre',
                'description','a.description'

			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);


		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.nom,' .
                'a.nombre,a.description'



			)
		);
		$query->from($db->quoteName('#__materiel').' AS a');

		return $query;
	}

    public static function save($data)
    {


        $db = JFactory::getDbo();

        $query = $db->getQuery(true);

// Fields to update.
        $fields = array(
            $db->quoteName('nom')      . ' = ' .$data->nom ,
            $db->quoteName('nombre')   . ' = ' .$data->nombre,
            $db->quoteName('description'). '=' .$data->description

        );

// Conditions for which records should be updated.
        $conditions = array(
            $db->quoteName('idmat') . ' =' .$data->idmat,

        );

        $query->update($db->quoteName('#__materiel'))->set($fields)->where($conditions);

        $db->setQuery($query);



      //


    }
}