<div class="customers form large-10 medium-9 columns">
    <?= $this->Form->create($customer); ?>
    <fieldset>
        <legend class="asapblau"><h3>Kunde <?= h($customer->id) ?> bearbeiten</h3></legend>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('first_name', array('label'=>'Vorname')); ?></p>
            <p><? echo $this->Form->input('last_name', array('label'=>'Nachname')); ?></p>
            <p><? echo $this->Form->input('company', array('label'=>'Firma')); ?></p>
            <p><? echo $this->Form->input('email', array('label'=>'E-Mail')); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('street', array('label'=>'Straße')); ?></p>
            <p><? echo $this->Form->input('postal_code', array('label'=>'Postleitzahl')); ?></p>
            <p><? echo $this->Form->input('country', array('label'=>'Land')); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('customer_type_id', ['label' => 'Kundengruppe','options' => $customerTypes]); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
        </div>

    </fieldset>
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
