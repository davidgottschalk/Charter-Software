<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Plane'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('plane_name') ?></th>
            <th><?= $this->Paginator->sort('plane_number') ?></th>
            <th><?= $this->Paginator->sort('plane_type_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($planes as $plane): ?>
        <tr>
            <td><?= $this->Number->format($plane->id) ?></td>
            <td><?= h($plane->plane_name) ?></td>
            <td><?= $this->Number->format($plane->plane_number) ?></td>
            <td>
                <?= $plane->has('plane_type') ? $this->Html->link($plane->plane_type->id, ['controller' => 'PlaneTypes', 'action' => 'view', $plane->plane_type->id]) : '' ?>
            </td>
            <td><?= h($plane->created) ?></td>
            <td><?= h($plane->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $plane->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plane->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plane->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id)]) ?>
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
