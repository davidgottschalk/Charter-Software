<div class="customerTypes form large-10 medium-9 columns">
    <?= $this->Form->create($customerType); ?>
    <fieldset>

        <legend><h3><?= __('Kundegruppe hinzufügen') ?></h3></legend>

        <?echo $this->Form->input('name');?>

    </fieldset>
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
