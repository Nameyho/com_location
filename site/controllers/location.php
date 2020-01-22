<?php

defined('_JEXEC') or die('Restricted access');


class LocationControllerLocation extends JControllerForm
{
    public function cancel($key = null)
    {

    }

    public function save($key = null, $urlVar = null)
    {

        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $input = $app->input;
        $model = $this->getModel('form');
        // Get the current URI to set in redirects. As we're handling a POST,
        // this URI comes from the <form action="..."> attribute in the layout file above
        $currentUri = (string)JUri::getInstance();

        // Check that this user is allowed to add a new record
        if (!JFactory::getUser()->authorise("core.create", "com_materiel")) {
            $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
            $app->setHeader('status', 403, true);

            return;
        }

        // get the data from the HTTP POST request
        $data = $input->get('jform', array(), 'array');

        // set up context for saving form data
        $context = "$this->option.edit.$this->context";

        // Validate the posted data.


        $data['iduser']=(int)JFactory::getUser()->get('id', 0);
        var_dump($data);

        $newDate = date("Y-m-d", strtotime($data["dateloc"]));

        var_dump($newDate);

        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);

        // Select all records from the user profile table where key begins with "custom.".
        // Order it by the ordering field.
        $query->select('SUM(nombres) AS indisponible');
        $query->from($db->quoteName('#__loue'));
        $query->where($db->quoteName('idmat') . ' = ' . $data["idmat"]);
        $query->where($db->quoteName('idtranche') . ' = ' . $data["idtranche"]);
        $query->where($db->quoteName('dateloc') . ' = ' . $db->quote($newDate));

        // Reset the query using our newly populated query object.
        $db->setQuery($query);

        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $indisponible = $db->loadresult();

        var_dump($indisponible);

        // Create a new query object.
        $query = $db->getQuery(true);

        // Select all records from the user profile table where key begins with "custom.".
        // Order it by the ordering field.
        $query->select('nombre AS total');
        $query->from($db->quoteName('#__materiel'));
        $query->where($db->quoteName('id') . ' = ' . $data["idmat"]);


        // Reset the query using our newly populated query object.
        $db->setQuery($query);

        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $total = $db->loadresult();

        var_dump($total);

        $disponible = $total - $indisponible;

        var_dump($disponible);


        if (($indisponible == null) && ($data["nombres"] <= $disponible)) {
            
                // Create a new query object.
$query = $db->getQuery(true);

// Insert columns.
$columns = array('idmat', 'nombres', 'iduser', 'idtranche','dateloc');

// Insert values.
$values = array($db->quote($data["idmat"]),
                    $db->quote($data["nombres"]),
                     $db->quote($data["iduser"]),
                     $db->quote($data["idtranche"]),
                     $db->quote($newDate));

// Prepare the insert query.
$query
    ->insert($db->quoteName('#__loue'))
    ->columns($db->quoteName($columns))
    ->values(implode(',', $values));

// Set the query using our newly populated query object and execute it.
$db->setQuery($query);
$db->execute();

$url = JFactory::getURI();
$request_url = $url->toString();
$app->enqueueMessage('reservation faite','');
$app->redirect($request_url);

        //    return parent::save();
        }

        if ($data["nombres"] <= $disponible) {
            $query = $db->getQuery(true);

            // Insert columns.
            $columns = array('idmat', 'nombres', 'iduser', 'idtranche','dateloc');
            
            // Insert values.
            $values = array($db->quote($data["idmat"]),
                                $db->quote($data["nombres"]),
                                 $db->quote($data["iduser"]),
                                 $db->quote($data["idtranche"]),
                                 $db->quote($newDate));
            
            // Prepare the insert query.
            $query
                ->insert($db->quoteName('#__loue'))
                ->columns($db->quoteName($columns))
                ->values(implode(',', $values));
            
            // Set the query using our newly populated query object and execute it.
            $db->setQuery($query);
            $db->execute();
            
            $url = JFactory::getURI();
            $request_url = $url->toString();
            $app->enqueueMessage('reservation faite','');
            $app->redirect($request_url);
          //  return parent::save();
        } else {

            $document = JFactory::getDocument();
            $document->addScriptDeclaration('
  
        alert("Il n\y a plus assez de ce matériel disponible");
    
');
            $app = JFactory::getApplication();


            $url = JFactory::getURI();
            $request_url = $url->toString();

            var_dump($request_url);
            $app->enqueueMessage('Plus assez de ce matériel disponible', 'Echec');
            $app->redirect($request_url);
        }

    }}