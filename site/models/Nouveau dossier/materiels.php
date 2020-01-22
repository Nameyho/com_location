<?php
defined('_JEXEC') or die;

class LocationModelMateriels extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'idmat', 'a.idmat',
                'idmat','a.idmat',
                'nombres','a.nombres',
                'iduser','a.iduser',
                'etatlocation','a.etatlocation',
                'idtranche','a.idtranche',
                'datelloc','a.dateloc'

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
				'a.id, a.idmat,' .
                'a.nombres,a.iduser,'.
                'a.etatlocation,a.idtranche,a.dateloc'




			)
		);
		$query->from($db->quoteName('#__loue').' AS a');

		return $query;


    }
}