<div class="customers form large-10 medium-9 columns">
    <?= $this->Form->create($customer); ?>
    <fieldset>

        <legend><h3>Kunde <?= h($customer->id) ?> bearbeiten</h3></legend>

        <div class="large-3 columns strings edit-table">
            <h6 class="subheader"><?= __('Vorname') ?></h6>
            <p><? echo $this->Form->input('first_name'); ?></p>
            <h6 class="subheader"><?= __('Nachname') ?></h6>
            <p><? echo $this->Form->input('last_name'); ?></p>
            <h6 class="subheader"><?= __('Firma') ?></h6>
            <p><? echo $this->Form->input('company'); ?></p>
            <h6 class="subheader"><?= __('E-Mail') ?></h6>
            <p><? echo $this->Form->input('email'); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <h6 class="subheader"><?= __('Straße') ?></h6>
            <p><? echo $this->Form->input('street'); ?></p>
            <h6 class="subheader"><?= __('PLZ') ?></h6>
            <p><? echo $this->Form->input('postal_code'); ?></p>
            <h6 class="subheader"><?= __('Ort') ?></h6>
            <p><? echo $this->Form->input('country'); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
            <h6 class="subheader"><?= __('Customer Type') ?></h6>
            <p><? echo $this->Form->input('customer_type_id', ['options' => $customerTypes]); ?></p>
        </div>

        <div class="large-3 columns strings edit-table">
        </div>

    </fieldset>
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
