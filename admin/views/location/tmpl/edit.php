<?php
defined('_JEXEC') or die;

?>

<form action="<?php  echo JRoute::_('index.php?option=com_location&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate" onsubmit="">
    <div class="row-fluid">
        <div class="span10 form-horizontal">

            <fieldset>
                <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

                <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->id) ? JText::_('Ajout de Location', true) :
                    JText::sprintf('Ajout de Location', $this->item->id, true)); ?>
                    <!--
                        chaque affichage rependra le même principe
                        la fonction getLabel servira à afficher le nom du champ
                        et la fonction getInput à afficher le champ d'insertion de donnée en fonction du type 
                        de champ indiqué dans le dossier model>form>location.xml
                        -->
                <div class="control-group">
                    <div class="control-label"><?php echo   $this->form->getLabel('idmat'); ?></div>
                    <div class="controls"><?php  echo $this->form->getInput('idmat');?></div>
                </div>
                <div class="control-group">
                    <div class="control-label"><?php echo   $this->form->getLabel('nombres'); ?></div>
                    <div class="controls"><?php  echo $this->form->getInput('nombres'); ?></div>
                </div>
                <div class="control-group">
                    <div class="control-label"><?php echo $this->form->getLabel('iduser'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('iduser'); ?></div>
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
                <!--
                    ceci permet d'éviter un appel hors site de la page et vérifie 
                    que le formulaire appartient au bon site joomla
                    -->
                <?php echo JHtml::_('form.token'); ?>

                <?php echo JHtml::_('bootstrap.endPane'); ?>
            </fieldset>
        </div>
    </div>
</form>