<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Customer Type'), ['action' => 'edit', $customerType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Type'), ['action' => 'delete', $customerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customerTypes view large-10 medium-9 columns">
    <h2><?= h($customerType->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($customerType->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($customerType->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Customers') ?></h4>
    <?php if (!empty($customerType->customers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Company') ?></th>
            <th><?= __('Street') ?></th>
            <th><?= __('Postal Code') ?></th>
            <th><?= __('Country') ?></th>
            <th><?= __('Customer Type Id') ?></th>
            <th><?= __('Strike') ?></th>
            <th><?= __('Email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($customerType->customers as $customers): ?>
        <tr>
            <td><?= h($customers->id) ?></td>
            <td><?= h($customers->first_name) ?></td>
            <td><?= h($customers->last_name) ?></td>
            <td><?= h($customers->company) ?></td>
            <td><?= h($customers->street) ?></td>
            <td><?= h($customers->postal_code) ?></td>
            <td><?= h($customers->country) ?></td>
            <td><?= h($customers->customer_type_id) ?></td>
            <td><?= h($customers->strike) ?></td>
            <td><?= h($customers->email) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
