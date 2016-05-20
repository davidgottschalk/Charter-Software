<div class="customerTypes form large-10 medium-9 columns">
    <?= $this->Form->create($customerType); ?>
    <fieldset>

        <legend><h3>Kundengruppe <?= h($customerType->name) ?> bearbeiten</h3></legend>

        <p><? echo $this->Form->input('name'); ?></p>

    </fieldset>
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
