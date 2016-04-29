<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employees index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('first_name') ?></th>
            <th><?= $this->Paginator->sort('last_name') ?></th>
            <th><?= $this->Paginator->sort('street') ?></th>
            <th><?= $this->Paginator->sort('country') ?></th>
            <th><?= $this->Paginator->sort('postal_code') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $this->Number->format($employee->id) ?></td>
            <td><?= h($employee->first_name) ?></td>
            <td><?= h($employee->last_name) ?></td>
            <td><?= h($employee->street) ?></td>
            <td><?= h($employee->country) ?></td>
            <td><?= $this->Number->format($employee->postal_code) ?></td>
            <td><?= h($employee->username) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
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
