<div class="customers view large-12 medium-9 columns">
    <fieldset>
        <legend class="asapblau">Kundennummer <?= h($customer->customer_number) ?></legend>

        <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Vorname') ?></h6>
            <p><?= h($customer->first_name) ?></p>
            <h6 class="subheader"><?= __('Nachname') ?></h6>
            <p><?= h($customer->last_name) ?></p>
            <h6 class="subheader"><?= __('Firma') ?></h6>
            <p><?= h($customer->company) ?></p>
            <h6 class="subheader"><?= __('E-Mail') ?></h6>
            <p><?= h($customer->email) ?></p>
        </div>

        <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Straße') ?></h6>
            <p><?= h($customer->street) ?></p>
            <h6 class="subheader"><?= __('PLZ') ?></h6>
            <p><?= $this->Number->format($customer->postal_code) ?></p>
            <h6 class="subheader"><?= __('Ort') ?></h6>
            <p><?= h($customer->country) ?></p>
        </div>

        <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Kundengruppe') ?></h6>
            <p><?= $customer->has('customer_type') ? $this->Html->link($customer->customer_type->name, ['controller' => 'CustomerTypes', 'action' => 'view', $customer->customer_type->id]) : '' ?></p>
        </div>

        <div class="large-3 columns strings view-table">
        </div>
    </fieldset>
    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $customer->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
<br><br><br><br>
<div>
<div class="related row">
    <div class="column large-12">
    <?php if (!empty($customer->flights) ): ?>
    <h4 class="subheader"><?= __('Flüge des Kunden') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <th><?= __('Flugnummer') ?></th>
            <th><?= __('Start Datum') ?></th>
            <th><?= __('Ende Datum') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('') ?></th>
        </head>
        <tbody>
        <?php foreach ($customer->flights as $flights):
            if($flights->status != FLIGHT_DUMMY){
            ?>
                <tr>
                    <td><?= h($flights->flight_number) ?></td>
                    <td><?= h($flights->start_date) ?></td>
                    <td><?= h($flights->end_date) ?></td>
                    <td><?= $flightStatus[$flights->status] ?></td>

                    <td class="actions">
                        <span class="actions secondary"><?= $this->Html->link("Anzeigen", ['controller' => 'Flights', 'action' => 'view', $flights->id]) ?></span>
                    </td>
                </tr>
            <?}?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    </div>
</div>
