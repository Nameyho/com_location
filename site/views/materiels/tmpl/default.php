<?php
defined('_JEXEC') or die;

$user = JFactory::getUser();

if($user->id == 0)
{
    JError::raiseWarning( 403, JText::_( 'Vous devez être connecté') );
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';

    echo "<br><a href='".JRoute::_($joomlaLoginUrl)."'>".JText::_( 'Connectez-vous')."</a><br>";
}

else {
    ?>


    <form action="<?php echo JRoute::_('index.php?option=com_location&view=materiels'); ?>" method="post" name="adminForm" id="adminForm">
        <div id="j-main-container" class="span12">

            <div class="clearfix"> </div>
            <table class="table table-striped" id="locationList">
                <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <input type="checkbox" name="checkall-toggle" value="" title="<?php  echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="title"width="5%">
                        <?php echo ('Professeur'); ?>
                    </th>

                    <th class="title"width="5%">
                        <?php echo ('matériel'); ?>
                    </th>

                    <th class="title"width="5%">
                        <?php echo ('date'); ?>
                    </th>



                </tr>
                </thead>
                <tbody>
                <?php


                foreach ($this->items  as $i => $item) :


                    ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td class=" hidden-phone">
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            <a href="<?php  echo JRoute::_('index.php?option=com_materiel&task=materiel.edit&id='.(int) $item->id); ?>">

                            </a>
                        </td>

                        <td class=" hidden-phone">
                            <?php
                            // Get a db connection.
                            $db = JFactory::getDbo();

                            // Create a new query object.
                            $query = $db->getQuery(true);

                            // Select all records from the user profile table where key begins with "custom.".
                            // Order it by the ordering field.
                            $query->select($db->quoteName('username'));
                            $query->from($db->quoteName('#__users'));
                            $query->where($db->quoteName('id') . ' = ' .$item->iduser);

                            // Reset the query using our newly populated query object.
                            $db->setQuery($query);

                            // Load the results as a list of stdClass objects (see later for more options on retrieving data).
                            $results = $db->loadObjectList();



                            echo $this->escape($results[0]->username); ?>
                        </td>


                        <td class=" hidden-phone">
                            <?php
                            // Get a db connection.
                            $db = JFactory::getDbo();

                            // Create a new query object.
                            $query = $db->getQuery(true);

                            // Select all records from the user profile table where key begins with "custom.".
                            // Order it by the ordering field.
                            $query->select($db->quoteName('nom'));
                            $query->from($db->quoteName('#__materiel'));
                            $query->where($db->quoteName('id') . ' = ' .$item->idmat);

                            // Reset the query using our newly populated query object.
                            $db->setQuery($query);

                            // Load the results as a list of stdClass objects (see later for more options on retrieving data).
                            $results = $db->loadObjectList();



                            echo $this->escape($results[0]->nom); ?>
                        </td>


                        <td class=" hidden-phone">
                            <?php echo  $this->escape($item->dateloc); ?>
                        </td>





                    </tr>
                <?php endforeach;?>

                
                </tbody>
            </table>

            <input type="hidden" name="task" value="" />
            <input type="hidden" name="boxchecked" value="0" />

            <?php  echo

            JHtml::_('form.token'); ?>
        </div>
    </form>
    <?php

}

?>
