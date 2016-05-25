<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Airports Flight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airportsFlights index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('flight_id') ?></th>
            <th><?= $this->Paginator->sort('airport_id') ?></th>
            <th><?= $this->Paginator->sort('flight_time') ?></th>
            <th><?= $this->Paginator->sort('stay_duration') ?></th>
            <th><?= $this->Paginator->sort('order_number') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($airportsFlights as $airportsFlight): ?>
        <tr>
            <td><?= $this->Number->format($airportsFlight->id) ?></td>
            <td>
                <?= $airportsFlight->has('flight') ? $this->Html->link($airportsFlight->flight->id, ['controller' => 'Flights', 'action' => 'view', $airportsFlight->flight->id]) : '' ?>
            </td>
            <td>
                <?= $airportsFlight->has('airport') ? $this->Html->link($airportsFlight->airport->name, ['controller' => 'Airports', 'action' => 'view', $airportsFlight->airport->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($airportsFlight->flight_time) ?></td>
            <td><?= $this->Number->format($airportsFlight->stay_duration) ?></td>
            <td><?= $this->Number->format($airportsFlight->order_number) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $airportsFlight->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $airportsFlight->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $airportsFlight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airportsFlight->id)]) ?>
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
