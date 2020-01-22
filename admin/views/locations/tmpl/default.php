<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_location&view=location'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span12">

        <!-- ici on indique les titre des colonnes
            -->
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
                    <th class="title"width="5%">
                        <?php echo ('nombre'); ?>
                    </th>
                    <!--
                        affichage de la barre latérale
                        -->
                    <div id="j-sidebar-container" class="span2">
                        <?php echo $this->sidebar; ?>
                    </div>


				</tr>
			</thead>
			<tbody>
			<?php

            //on affiche la liste des locations
            foreach ($this->items  as $i => $item) :


				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class=" phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        <a href="<?php  echo JRoute::_('index.php?option=com_location&task=materiel.edit&id='.(int) $item->id); ?>">

                        </a>
					</td>

                    <td class=" phone">
                        <?php
                       
                        $db = JFactory::getDbo();
                        $query = $db->getQuery(true);
                        $query->select($db->quoteName('username'));
                        $query->from($db->quoteName('#__users'));
                        $query->where($db->quoteName('id') . ' = ' .$item->iduser);
                        $db->setQuery($query);
                        $results = $db->loadObjectList();

                        //j'ai récupéré le nom de l'utilisateur grâce a l'id
                        //pour en afficher le nom après

                        echo $this->escape($results[0]->username); ?>
                    </td>


                    <td class=" phone">
                        <?php
                        $db = JFactory::getDbo();
                        $query = $db->getQuery(true);
                        $query->select($db->quoteName('nom'));
                        $query->from($db->quoteName('#__materiel'));
                        $query->where($db->quoteName('id') . ' = ' .$item->idmat);
                        $db->setQuery($query);
                        $results = $db->loadObjectList();

                        //même principe que précedemment mais avec le nom du matériel

                        echo $this->escape($results[0]->nom); ?>
                    </td>
                        <td class=" phone">
                        <?php echo  $this->escape($item->dateloc); ?>
                    </td>

                    </td>
                        <td class=" phone">
                        <?php echo  $this->escape($item->nombres); ?>
                    </td>
				</tr>
				<?php endforeach;
			?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		
		<?php  echo

        JHtml::_('form.token'); ?>
	</div>
</form>