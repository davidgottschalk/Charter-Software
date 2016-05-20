<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Flight'), ['action' => 'edit', $flight->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Flight'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="flights view large-10 medium-9 columns">
    <h2><?= h($flight->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Flight Number') ?></h6>
            <p><?= h($flight->flight_number) ?></p>
            <h6 class="subheader"><?= __('Customer') ?></h6>
            <p><?= $flight->has('customer') ? $this->Html->link($flight->customer->id, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Plane') ?></h6>
            <p><?= $flight->has('plane') ? $this->Html->link($flight->plane->id, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($flight->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($flight->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Start Date') ?></h6>
            <p><?= h($flight->start_date) ?></p>
            <h6 class="subheader"><?= __('End Date') ?></h6>
            <p><?= h($flight->end_date) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Invoices') ?></h4>
    <?php if (!empty($flight->invoices)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Flight Id') ?></th>
            <th><?= __('Due Date') ?></th>
            <th><?= __('Value') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($flight->invoices as $invoices): ?>
        <tr>
            <td><?= h($invoices->id) ?></td>
            <td><?= h($invoices->flight_id) ?></td>
            <td><?= h($invoices->due_date) ?></td>
            <td><?= h($invoices->value) ?></td>
            <td><?= h($invoices->status) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Airports') ?></h4>
    <?php if (!empty($flight->airports)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('City') ?></th>
            <th><?= __('Country') ?></th>
            <th><?= __('Iata Faa') ?></th>
            <th><?= __('Icao') ?></th>
            <th><?= __('Latitude') ?></th>
            <th><?= __('Longitude') ?></th>
            <th><?= __('Altitude') ?></th>
            <th><?= __('Timezone') ?></th>
            <th><?= __('Dst') ?></th>
            <th><?= __('Timezone Db') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($flight->airports as $airports): ?>
        <tr>
            <td><?= h($airports->id) ?></td>
            <td><?= h($airports->name) ?></td>
            <td><?= h($airports->city) ?></td>
            <td><?= h($airports->country) ?></td>
            <td><?= h($airports->iata_faa) ?></td>
            <td><?= h($airports->icao) ?></td>
            <td><?= h($airports->latitude) ?></td>
            <td><?= h($airports->longitude) ?></td>
            <td><?= h($airports->altitude) ?></td>
            <td><?= h($airports->timezone) ?></td>
            <td><?= h($airports->dst) ?></td>
            <td><?= h($airports->timezone_db) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Airports', 'action' => 'view', $airports->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Airports', 'action' => 'edit', $airports->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Airports', 'action' => 'delete', $airports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airports->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($flight->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Street') ?></th>
            <th><?= __('Country') ?></th>
            <th><?= __('Postal Code') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Group Id') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Payment') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Exit Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($flight->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->first_name) ?></td>
            <td><?= h($users->last_name) ?></td>
            <td><?= h($users->street) ?></td>
            <td><?= h($users->country) ?></td>
            <td><?= h($users->postal_code) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->group_id) ?></td>
            <td><?= h($users->status) ?></td>
            <td><?= h($users->payment) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->exit_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
