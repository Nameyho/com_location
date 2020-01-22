<?php
defined('_JEXEC') or die;
class LocationControllerLocation extends JControllerForm
{


    function save($key = null, $urlVar = null)
    {

        //on récupére les données dans la super variable $_POST
        $data = $_POST["jform"];

        //je formate la date pour que joomla comprenne le format

        $newDate = date("Y-m-d", strtotime($data["dateloc"]));

        
        // je crée une connection à la base de données

        $db = JFactory::getDbo();

        // je créée un nouvel objet de requete
        $query = $db->getQuery(true);

        // Je crée ma requete select
        // J'obtiens la somme de matériel déjà loué selon la tranche horaire,
        // la date ainsi que l'id du matériel
        $query->select('SUM(nombres) AS indisponible');
        $query->from($db->quoteName('#__loue'));
        $query->where($db->quoteName('idmat') . ' = ' . $data["idmat"]);
        $query->where($db->quoteName('idtranche') . ' = ' . $data["idtranche"]);
        $query->where($db->quoteName('dateloc') . ' = ' . $db->quote($newDate));

        // on affecte l'objet query afin le nouvelle objet qu'on vient de crée
        $db->setQuery($query);

        // on récupére les données
        $indisponible = $db->loadresult();


        // on refait la même opération mais cette fois si pour savoir le stock de dispo
        $query = $db->getQuery(true);
        $query->select('nombre AS total');
        $query->from($db->quoteName('#__materiel'));
        $query->where($db->quoteName('id') . ' = ' . $data["idmat"]);

        $db->setQuery($query);

        $total = $db->loadresult();

        //ici on va calculer le stock disponible

        $disponible = $total - $indisponible;

        

        if (($indisponible == null) && ($data["nombres"] <= $disponible)) {
            //si pas d'indisponible et que le nombre demandé est suffisant pour le stock
            // alors on appel la fonction de la classe parente pour effectuer la reservation
            return parent::save();
        }
        // et si pas possible on affiche ceci
         else {

            //on déclare ceci afin de pouvoir utiliser du javascript
            $document = JFactory::getDocument();
            $document->addScriptDeclaration('
  
        alert("Il n\y a plus assez de ce matériel disponible");
    
');
            //ceci va permettre de rediriger l'utilisation en cas d'échec
            $app = JFactory::getApplication();

            $url = JFactory::getURI();
            $request_url = $url->toString();

            $app->enqueueMessage('Plus assez de ce matériel disponible', 'échec');
            $app->redirect($request_url);
        }


    }

}