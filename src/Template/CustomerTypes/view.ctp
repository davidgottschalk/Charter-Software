<div class="customerTypes view large-10 medium-9 columns">
    <fieldset>
        <legend><h3>Kundengruppe <?= h($customerType->name) ?></h3></legend>

        <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($customerType->name) ?></p>
        </div>

       <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($customerType->id) ?></p>
        </div>

        <div class="large-3 columns strings view-table">
        </div>
    </fieldset>

    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $customerType->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
<br><br><br><br>
</div>

<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Kunden in dieser Gruppe') ?></h4>
    <?php if (!empty($customerType->customers)): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('KdrNr') ?></th>
                <th><?= __('Vorname') ?></th>
                <th><?= __('Nachname') ?></th>
                <th><?= __('Firma') ?></th>
                <th><?= __('Straße') ?></th>
                <th><?= __('PLZ') ?></th>
                <th><?= __('Ort') ?></th>
                <th class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <?php foreach ($customerType->customers as $customers): ?>
        <tbody>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->first_name) ?></td>
                <td><?= h($customers->last_name) ?></td>
                <td><?= h($customers->company) ?></td>
                <td><?= h($customers->street) ?></td>
                <td><?= h($customers->postal_code) ?></td>
                <td><?= h($customers->country) ?></td>

                <td class="actions">
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?></span>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    </div>
</div>
