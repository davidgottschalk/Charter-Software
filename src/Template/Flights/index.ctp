<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Flight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="flights index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('flight_number') ?></th>
            <th><?= $this->Paginator->sort('customer_id') ?></th>
            <th><?= $this->Paginator->sort('plane_id') ?></th>
            <th><?= $this->Paginator->sort('start_date') ?></th>
            <th><?= $this->Paginator->sort('end_date') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($flights as $flight): ?>
        <tr>
            <td><?= $this->Number->format($flight->id) ?></td>
            <td><?= h($flight->flight_number) ?></td>
            <td>
                <?= $flight->has('customer') ? $this->Html->link($flight->customer->id, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?>
            </td>
            <td>
                <?= $flight->has('plane') ? $this->Html->link($flight->plane->id, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?>
            </td>
            <td><?= h($flight->start_date) ?></td>
            <td><?= h($flight->end_date) ?></td>
            <td><?= h($flight->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flight->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?>
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
