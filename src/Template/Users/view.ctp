<div class="users view large-10 medium-9 columns">
    <fieldset>
        <legend><h3> <?= h($user->first_name)?> <?= h($user->last_name) ?></h3></legend>
        <div class="large-4 columns strings view-table">
            <h6 class="subheader"><?= __('Personalnummer') ?></h6>
            <p><?= h($user->id) ?></p>
            <h6 class="subheader"><?= __('Benutzername') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $userStatus[$user->status] ?></p>
            <h6 class="subheader"><?= __('E-Mail') ?></h6>
            <p><?= $user->email ?></p>
        </div>
        <div class="large-4 columns strings view-table">
            <h6 class="subheader"><?= __('Straße') ?></h6>
            <p><?= h($user->street) ?></p>
            <h6 class="subheader"><?= __('PLZ') ?></h6>
            <p><?= $user->postal_code ?></p>
            <h6 class="subheader"><?= __('Ort') ?></h6>
            <p><?= h($user->country) ?></p>

        </div>
        <div class="large-3 columns strings view-table">
            <h6 class="subheader"><?= __('Gehalt') ?></h6>
            <p><?= h($user->payment) ?></p>
            <h6 class="subheader"><?= __('angestellt seit') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('ausgeschieden am') ?></h6>
            <p><?= (!empty($user->exit_date))?h($user->exit_date):"---"; ?></p>
        </div>
        <div class="large-4 columns strings view-table">
        </div>

    </fieldset>
    <?if($authUser['group_id'] == 4){?>
        <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $user->id]) ?></span>
        <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?}?>
    <br><br><br><br>
</div>

<div class="related row">
    <div class="column large-12">
    <? if (!empty($user->flights)){ ?>
    <h4 class="subheader"><?= __('Flüge') ?></h4>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Flug-Nummer') ?></th>
                <th><?= __('Kundennummer') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Status') ?></th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($user->flights as $flights){ ?>
            <tr>
                <td><?= h($flights->flight_number) ?></td>
                <td><?= h($flights->customer->customer_number) ?></td>
                <td><?= h($flights->start_date) ?></td>
                <td><?= h($flights->end_date) ?></td>
                <td><?= $flightStatus[$flights->status] ?></td>
            </tr>
        <? } ?>
        </tbody>
    </table>

    <? } ?>
    </div>
</div>
