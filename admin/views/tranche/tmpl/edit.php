<?php
defined('_JEXEC') or die;
JHtml::_('behavior.formvalidator');
JHTML::_('behavior.calendar');
?>

<form action="<?php  echo JRoute::_('index.php?option=com_location&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate" >
    <div class="row-fluid">
        <div class="span10 form-horizontal">

            <fieldset>
                <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

                <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->id) ? JText::_('Ajout de Tranches Horaires', true) :
                    JText::sprintf('Ajout de Location', $this->item->id, true)); ?>


                <div class="control-group">
                    <div class="control-label"><?php echo   $this->form->getLabel('datedebut'); ?></div>
                    <div class="controls"><?php  echo $this->form->getInput('datedebut');?></div>
                </div>

                <div class="control-group">
                    <div class="control-label"><?php echo   $this->form->getLabel('datefin'); ?></div>
                    <div class="controls"><?php  echo $this->form->getInput('datefin'); ?></div>
                </div>

                <div class="control-group">
                    <div class="control-label"><?php echo   $this->form->getLabel('info'); ?></div>
                    <div class="controls"><?php  echo $this->form->getInput('info'); ?></div>
                </div>
                    <div class="control-label"><?php echo   $this->form->getLabel('info1'); ?></div>

                    <div class="control-label"><?php echo   $this->form->getLabel('info2'); ?></div>

                    <div class="control-label"><?php echo   $this->form->getLabel('info3'); ?></div>

                </div>

                <?php echo JHtml::_('bootstrap.endPanel'); ?>

                <input type="hidden" name="task" value="location.edit" />
                <?php echo JHtml::_('form.token'); ?>

                <?php echo JHtml::_('bootstrap.endPane'); ?>
            </fieldset>
        </div>
    </div>
</form>