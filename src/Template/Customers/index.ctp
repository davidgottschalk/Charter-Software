<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customer Types'), ['controller' => 'CustomerTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Type'), ['controller' => 'CustomerTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('first_name') ?></th>
            <th><?= $this->Paginator->sort('last_name') ?></th>
            <th><?= $this->Paginator->sort('company') ?></th>
            <th><?= $this->Paginator->sort('street') ?></th>
            <th><?= $this->Paginator->sort('postal_code') ?></th>
            <th><?= $this->Paginator->sort('country') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $this->Number->format($customer->id) ?></td>
            <td><?= h($customer->first_name) ?></td>
            <td><?= h($customer->last_name) ?></td>
            <td><?= h($customer->company) ?></td>
            <td><?= h($customer->street) ?></td>
            <td><?= $this->Number->format($customer->postal_code) ?></td>
            <td><?= h($customer->country) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
