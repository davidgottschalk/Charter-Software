<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Users Flight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usersFlights index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('flight_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usersFlights as $usersFlight): ?>
        <tr>
            <td>
                <?= $usersFlight->has('flight') ? $this->Html->link($usersFlight->flight->id, ['controller' => 'Flights', 'action' => 'view', $usersFlight->flight->id]) : '' ?>
            </td>
            <td>
                <?= $usersFlight->has('user') ? $this->Html->link($usersFlight->user->id, ['controller' => 'Users', 'action' => 'view', $usersFlight->user->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $usersFlight->flight_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersFlight->flight_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersFlight->flight_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFlight->flight_id)]) ?>
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
