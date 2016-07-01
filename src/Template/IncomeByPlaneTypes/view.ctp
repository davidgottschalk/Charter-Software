<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Income By Plane Type'), ['action' => 'edit', $incomeByPlaneType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Income By Plane Type'), ['action' => 'delete', $incomeByPlaneType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomeByPlaneType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Income By Plane Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income By Plane Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="incomeByPlaneTypes view large-10 medium-9 columns">
    <h2><?= h($incomeByPlaneType->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Plane Type') ?></h6>
            <p><?= $incomeByPlaneType->has('plane_type') ? $this->Html->link($incomeByPlaneType->plane_type->id, ['controller' => 'PlaneTypes', 'action' => 'view', $incomeByPlaneType->plane_type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Invoice') ?></h6>
            <p><?= $incomeByPlaneType->has('invoice') ? $this->Html->link($incomeByPlaneType->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $incomeByPlaneType->invoice->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($incomeByPlaneType->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($incomeByPlaneType->created) ?></p>
        </div>
    </div>
</div>
