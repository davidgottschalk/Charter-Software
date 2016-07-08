<div class="flights view large-12 medium-9 columns">
    <fieldset>
        <legend class="asapblau"><?= "Flugnummer : ".h($flight->flight_number) ?></legend>

        <div class="row">
            <div class="large-5 columns strings">
                <h6 class="subheader"><?= __('Flugnummer') ?></h6>
                <p><?= h($flight->flight_number) ?></p>
                <h6 class="subheader"><?= __('Kundennummer') ?></h6>
                <p><?= $flight->has('customer') ? $this->Html->link($flight->customer->customer_number, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?></p>
                <h6 class="subheader"><?= __('Flugzeug') ?></h6>
                <p><?= $flight->has('plane') ? $this->Html->link($flight->plane->plane_name, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?></p>
                <h6 class="subheader"><?= __('Catering') ?></h6>
                <p><?if($flight->catering == CATERING_VEG){echo 'Vegan';}elseif($flight->catering == CATERING_VIP){echo 'VIP';}else{echo 'Economy';}?></p>
            </div>
            <div class="large-2 columns numbers end">

                <h6 class="subheader"><?= __('Status') ?></h6>
                <p><?= $flightStatus[$flight->status] ?></p>
            </div>
            <div class="large-2 columns dates end">
                <h6 class="subheader"><?= __('Start Datum') ?></h6>
                <p><?= h($flight->start_date) ?></p>
                <h6 class="subheader"><?= __('End Datum') ?></h6>
                <p><?= h($flight->end_date) ?></p>
            </div>
        </div>
    </fieldset>
    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $flight->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
</div>

<div class="related row">
    <div style="margin-top:50px;" class="column large-12">
    <?php if (!empty($flight->invoices)): ?>
    <h4 class="subheader"><?= __('Rechnung') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Rechnungsnummer') ?></th>
            <th><?= __('Flugnummer') ?></th>
            <th><?= __('Zahlunsfrist') ?></th>
            <th><?= __('Betrag') ?></th>
            <th><?= __('Status') ?></th>
        </tr>
        <?php foreach ($flight->invoices as $invoices): ?>
        <tr>
            <td><?= h($invoices->invoice_number) ?></td>
            <td><?= h($flight->flight_number) ?></td>
            <td><?= h($invoices->due_date) ?></td>
            <td><?= h($invoices->value) ?></td>
            <td><?= h($invoices->status) ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>

<div class="related row">
    <div class="column large-12">
    <?php if (!empty($flight->airports)): ?>
    <h4 class="subheader"><?= __('Stationen') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th><?= __('Flughafen') ?></th>
            <th><?= __('Stadt') ?></th>
            <th><?= __('Land') ?></th>
            <th>Aufenthaltsdauer</th>
            <th>Reisezeit</th>

            <th><?= __('Breite') ?></th>
            <th><?= __('Länge') ?></th>
            <th><?= __('Höhe') ?></th>
        </tr>
        <?php foreach ($flight->airports as $airports): ?>
        <tr>
            <td><?= h($airports->airport_name) ?></td>
            <td><?= h($airports->city) ?></td>
            <td><?= h($airports->country) ?></td>
            <td><?= h($airports->_joinData->stay_duration).'(Stunden)' ?></td>
            <td><?= h($airports->_joinData->flight_time).'(Minuten)' ?></td>

            <td><?= h($airports->latitude) ?></td>
            <td><?= h($airports->longitude) ?></td>
            <td><?= h($airports->altitude) ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>

<div class="related row">
    <div class="column large-12">
    <?php if (!empty($flight->users)): ?>
    <h4 class="subheader"><?= __('Crew-Mitglieder') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th><?= __('Vorname') ?></th>
            <th><?= __('Nachname') ?></th>
            <th><?= __('Benutzername') ?></th>
            <th><?= __('Gruppe') ?></th>
            <th><?= __('Bezahlung') ?></th>

        </tr>
        <?php foreach ($flight->users as $users): ?>
        <tr>
            <td><?= h($users->first_name) ?></td>
            <td><?= h($users->last_name) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= $groupNames[$users->group_id-1]->name ?></td>
            <td><?= h($users->payment) ?></td>

        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
