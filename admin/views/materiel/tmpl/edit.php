<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_location&layout=edit&id='.(int)
    $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">

	<fieldset>
		<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

			<?php echo  JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->idmat) ?
                JText::_('COM_MATERIEL_NEW_MATERIEL', true) :
                JText::sprintf('COM_MATERIEL_MATERIEL_MATERIEL', $this->item->idmat, true));
			?>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('id'); ?></div>

				</div>
                  <div class="control-group">
                    <div class="control-label"><?php echo $this->form->getLabel('nom'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('nom'); ?></div>
                  </div>
                <div class="control-group">
                    <div class="control-label"><?php echo $this->form->getLabel('nombre'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('nombre'); ?></div>
                </div>
                 <div class="control-group">
                     <div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
                   <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
                  </div>
        <?php echo JHtml::_('bootstrap.endPanel'); ?>

			<input type="hidden" name="task" value="" />
			<?php echo JHtml::_('form.token'); ?>

		<?php echo JHtml::_('bootstrap.endPane'); ?>
		</fieldset>
		</div>
	</div>
</form>