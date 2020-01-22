<?php
defined('_JEXEC') or die;
JHtml::_('behavior.formvalidator');
$user = JFactory::getUser();

if($user->id == 0)
{
    JError::raiseWarning( 403, JText::_( 'Vous devez être connecté') );
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';

    echo "<br><a href='".JRoute::_($joomlaLoginUrl)."'>".JText::_( 'Connectez-vous')."</a><br>";
}

else {
?>
    <form action="<?php echo JRoute::_('index.php?option=com_location&view=materiel&layout=edit'); ?>"
          method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="row-fluid">
        <div class="span10 form-horizontal">

            <fieldset>
                <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

                <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->id) ? JText::_('Ajout de Location', true) :
        JText::sprintf('Ajout de Location', $this->item->id, true)); ?>
    <div class="control-group">
        <div class="control-label"><?php echo   $this->form->getLabel('idmat'); ?></div>
        <div class="controls"><?php  echo $this->form->getInput('idmat');
   ?></div>
    </div>
    <div class="control-group">
        <div class="control-label"><?php echo   $this->form->getLabel('nombres'); ?></div>
        <div class="controls"><?php  echo $this->form->getInput('nombres'); ?></div>
    </div>

    <div class="control-group">
        <div class="control-label"><?php echo   $this->form->getLabel('iduser'); ?></div>
        <div class="controls"><?php  echo $this->form->getInput('iduser'); ?></div>
    </div>


    <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('idtranche'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('idtranche'); ?></div>
    </div>

    <div class="control-group">
        <div class="control-label"><?php echo $this->form->getLabel('dateloc'); ?></div>
        <div class="controls"><?php echo $this->form->getInput('dateloc'); ?></div>
    </div>
    <?php echo JHtml::_('bootstrap.endPanel'); ?>

    <input type="hidden" name="task" value="location.edit" />
    <?php echo JHtml::_('form.token'); ?>

                <?php echo JHtml::_('bootstrap.endPane'); ?>
    </fieldset>
    </div>
    </div>


        <div class="btn-toolbar">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('location.save')">
                    <span class="icon-ok"></span><?php echo JText::_('Enregistrer') ?>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn" onclick="Joomla.submitbutton('location.cancel')">
                    <span class="icon-cancel"></span><?php echo JText::_('Annuler') ?>
                </button>
            </div>
        </div>
    </form>








    <?php
}


