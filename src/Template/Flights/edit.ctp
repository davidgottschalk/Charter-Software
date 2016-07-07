<div class="flights form large-10 medium-9 columns">
    <?= $this->Form->create($flight); ?>
    <fieldset>
        <legend>Flug bearbeiten <?=$flight->flight_number?></legend>
        <?=$this->Form->input('catering', ['label' => 'Catering','options' => $catering]); ?>
    </fieldset>
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
