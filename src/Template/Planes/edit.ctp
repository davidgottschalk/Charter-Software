
<div class="planes view large-12 medium-9 columns">
    <?= $this->Form->create($plane); ?>
    <fieldset>
        <legend class="asapblau"><?= __('Flugzeug bearbeiten') ?></legend>
        <div class="actions">
        </div>
    <br/>
    <div class="row">
    <div class="large-3 columns strings">
        <?php
            echo $this->Form->input('plane_name', array('label'=>'Flugzeugname'));
            echo $this->Form->input('plane_number', array('label'=>'Flugzeugnummer'));
            echo $this->Form->input('plane_type_id', array('options' => $planeTypes, 'label'=>'Flugzeugtyp', 'empty'=>'(bitte wählen)'));
        ?></div></div></div>
    </fieldset>
    <div class="planes form large-12 medium-9 columns">
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
