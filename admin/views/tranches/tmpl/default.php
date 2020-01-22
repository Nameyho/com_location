<?php
defined('_JEXEC') or die;

$listOrder	= '';
$listDirn	= '';
?>

<form action="<?php echo JRoute::_('index.php?option=com_location&view=tranche'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span12">

		<div class="clearfix"> </div>
		<table class="table table-striped" id="locationList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="
						<?php  echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th class="title"width="5%">
						<?php echo ('Heure de debut '); ?>
					</th>

                    <th class="title"width="5%">
                        <?php echo ('Heure de fin'); ?>
                    </th>

                    <div id="j-sidebar-container" class="span2">
                        <?php echo $this->sidebar; ?>
                    </div>


				</tr>
			</thead>
			<tbody>
			<?php


            foreach ($this->items  as $i => $item) :


				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class=" phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        <a href="<?php  echo JRoute::_('index.php?option=com_materiel&task=tranche.edit&id='.(int) $item->id); ?>">

                        </a>
					</td>

                    <td class=" phone">
						<?php 
						$d=strtotime($this->escape($item->datedebut));
						echo  date('H'."\h" .'i',$d); ?>
                    </td>


                    <td class=" phone">
					<?php
				$d=strtotime($this->escape($item->datefin));
				echo  date('H'."\h" .'i',$d);  ?>
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