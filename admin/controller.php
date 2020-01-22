<?php
defined('_JEXEC') or die;

class LocationController extends JControllerLegacy
{
	protected $default_view = 'locations';

	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/location.php';

		$view   = $this->input->get('view', 'locations');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');

		if ($view == 'materiel' && $layout == 'edit' && !$this->checkEditId('com_location.edit.materiel', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_location&view=materiel', false));

			return false;
		} 

		parent::display();

		return $this;
	}

	public function edit(){

        header('Location: '.$_SERVER['REQUEST_URI']);

$jinput = JFactory::getApplication()->input;
$name   = $jinput->get('name');

// Get a db connection.
        $db = JFactory::getDbo();

// Create a new query object.
        $query = $db->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
        $query->select($db->quoteName('id'));
        $query->from($db->quoteName('#__materiel'));
        $query->where($db->quoteName('nom') . '= "'. $name.'"');


// Reset the query using our newly populated query object.
        $db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $results = $db->loadObjectList();

            echo($name);
        var_dump($results);

       $idmat = $results[0]->idmat;

       echo ($idmat);


// Create a new query object.
        $query = $db->getQuery(true);

        $query
            ->select('MAX('.$db->quoteName('id').')')
            ->from($db->quoteName('#__loue'));



        // Reset the query using our newly populated query object.
        $db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $idloue = $db->loadresult();



echo ($idloue);






        $query = $db->getQuery(true);

// Fields to update.
        $fields = array(

            $db->quoteName('id') . ' = '.$idmat
        );

// Conditions for which records should be updated.
        $conditions = array(
           // $db->quoteName('idloue') . ' =  '. $idloue,
             $db->quoteName('idmat') . ' =  0',
        );

        $query->update($db->quoteName('#__loue'))->set($fields)->where($conditions);

        $db->setQuery($query);

        $result = $db->execute();



exit;

}
}