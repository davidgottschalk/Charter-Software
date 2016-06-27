<div class="customers form large-10 medium-9 columns">
    <?= $this->Form->create($customer); ?>
    <fieldset>
        <legend><h3><?= __('Kunde hinzufügen') ?></h3></legend>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('first_name',['label' => 'Vorname']); ?></p>
            <p><? echo $this->Form->input('last_name',['label' => 'Nachname']); ?></p>
            <p><? echo $this->Form->input('company',['label' => 'Firma']); ?></p>
            <p><? echo $this->Form->input('email',['label' => 'E-Mail']); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('street',['label' => 'Straße']); ?></p>
            <p><? echo $this->Form->input('postal_code',['label' => 'Postleitzahl']); ?></p>
            <p><? echo $this->Form->input('country',['label' => 'Land']); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <p><? echo $this->Form->input('customer_type_id', ['options' => $customerTypes, 'label' => 'Kundengruppe']); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
        </div>

    </fieldset>
    <?= $this->Form->button('Speichern') ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
