<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Plane Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planeTypes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('manufacturer') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('speed') ?></th>
            <th><?= $this->Paginator->sort('max_range') ?></th>
            <th><?= $this->Paginator->sort('pax') ?></th>
            <th><?= $this->Paginator->sort('engine_type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($planeTypes as $planeType): ?>
        <tr>
            <td><?= $this->Number->format($planeType->id) ?></td>
            <td><?= h($planeType->manufacturer) ?></td>
            <td><?= h($planeType->type) ?></td>
            <td><?= $this->Number->format($planeType->speed) ?></td>
            <td><?= $this->Number->format($planeType->max_range) ?></td>
            <td><?= $this->Number->format($planeType->pax) ?></td>
            <td><?= h($planeType->engine_type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $planeType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $planeType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $planeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planeType->id)]) ?>
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
