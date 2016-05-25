<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Airport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airports index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('city') ?></th>
            <th><?= $this->Paginator->sort('country') ?></th>
            <th><?= $this->Paginator->sort('iata_faa') ?></th>
            <th><?= $this->Paginator->sort('icao') ?></th>
            <th><?= $this->Paginator->sort('latitude') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($airports as $airport): ?>
        <tr>
            <td><?= $this->Number->format($airport->id) ?></td>
            <td><?= h($airport->name) ?></td>
            <td><?= h($airport->city) ?></td>
            <td><?= h($airport->country) ?></td>
            <td><?= h($airport->iata_faa) ?></td>
            <td><?= h($airport->icao) ?></td>
            <td><?= $this->Number->format($airport->latitude) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $airport->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $airport->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $airport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airport->id)]) ?>
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
