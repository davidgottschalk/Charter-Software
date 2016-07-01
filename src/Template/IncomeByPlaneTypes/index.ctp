<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Income By Plane Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="incomeByPlaneTypes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('plane_type_id') ?></th>
            <th><?= $this->Paginator->sort('invoice_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($incomeByPlaneTypes as $incomeByPlaneType): ?>
        <tr>
            <td><?= $this->Number->format($incomeByPlaneType->id) ?></td>
            <td>
                <?= $incomeByPlaneType->has('plane_type') ? $this->Html->link($incomeByPlaneType->plane_type->id, ['controller' => 'PlaneTypes', 'action' => 'view', $incomeByPlaneType->plane_type->id]) : '' ?>
            </td>
            <td>
                <?= $incomeByPlaneType->has('invoice') ? $this->Html->link($incomeByPlaneType->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $incomeByPlaneType->invoice->id]) : '' ?>
            </td>
            <td><?= h($incomeByPlaneType->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $incomeByPlaneType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $incomeByPlaneType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $incomeByPlaneType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomeByPlaneType->id)]) ?>
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
