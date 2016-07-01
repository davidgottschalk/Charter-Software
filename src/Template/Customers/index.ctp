<div class="customers index large-12 medium-9 columns">
    <h3>Kunden</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Kunde hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id', __('Kundennummer')) ?></th>
            <th><?= $this->Paginator->sort('first_name', __('Vorname')) ?></th>
            <th><?= $this->Paginator->sort('last_name', __('Nachname')) ?></th>
            <th><?= $this->Paginator->sort('company', __('Firma')) ?></th>
            <th><?= $this->Paginator->sort('street', __('Straße')) ?></th>
            <th><?= $this->Paginator->sort('postal_code', __('PLZ')) ?></th>
            <th><?= $this->Paginator->sort('country', __('Ort')) ?></th>
            <th><?= $this->Paginator->sort('email', __('E-Mail')) ?></th>
            <th style="width:200px"class="actions"><?= __('') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer):
        if(!$customer->status == CUSTOMER_ACTIVE){continue;}
    ?>
        <tr>
            <td><?= $this->Number->format($customer->id) ?></td>
            <td><?= h($customer->first_name) ?></td>
            <td><?= h($customer->last_name) ?></td>
            <td><?= h($customer->company) ?></td>
            <td><?= h($customer->street) ?></td>
            <td><?= $this->Number->format($customer->postal_code) ?></td>
            <td><?= h($customer->country) ?></td>
            <td><?= h($customer->email) ?></td>
            <td>
                <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $customer->id]) ?></span>
                <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $customer->id]) ?></span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . 'zurück') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('weiter' . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter("Seite {{page}} von {{pages}} ") ?></p>
    </div>
</div>
