<?php
defined('_JEXEC') or die;

$listOrder	= '';
$listDirn	= '';
?>

<form action="<?php echo JRoute::_('index.php?option=com_location&view=materiel'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span12">

		<div class="clearfix"> </div>
		<table class="table table-striped" id="MaterielList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php // echo JText::_('JGLOBAL_CHECK_ALL'); ?>" 
						onclick="Joomla.checkAll(this)" />
					</th>
					<th class="title"width="5%">
						<?php echo ('Id du matériel'); ?>
					</th>
                    <th class="nowrap hidden-phone" width="65%">
                        <?php echo('Nom'); ?>
                    </th>
                    <th class="nowrap left right-phone" width="10%">
                        <?php echo ( 'Nombre'); ?>
                    </th>
                    <th class="hidden" width="10%">
                        <?php echo ('description'); ?>
                    </th>
                    <div id="j-sidebar-container" class="span2">
                        <?php echo $this->sidebar; ?>
                    </div>
                 

				</tr>
			</thead>
			<tbody>
			<?php  foreach ($this->items  as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="nowrap has-context">
						<a href="<?php  echo  JRoute::_('index.php?option=com_location&task=materiel.edit&id='.(int) $item->id); ?>">
							<?php echo $this->escape($item->id); ?>
						</a>
					</td>
                    <td class="hidden-phone">
                        <?php echo   $this->escape($item->nom);?>
                    </td>
                    <td class="hidden-phone">
                        <?php echo $this->escape($item->nombre);?>
                    </td>


				</tr>
				<?php endforeach;
			?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php  echo

        JHtml::_('form.token'); ?>
	</div>
</form>