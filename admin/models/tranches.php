<?php
defined('_JEXEC') or die;



class LocationModelTranches extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
                'id ','a.id',
			    'datedebut', 'a.datedebut',
                'datefin', 'a.datefin',



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
               ' a.id,a.datedebut,' .
                'a.datefin'



			)
		);


		$query->from($db->quoteName('#__tranche').' AS a');

		return $query;


    }
}