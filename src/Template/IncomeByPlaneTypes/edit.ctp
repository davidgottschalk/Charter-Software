<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $incomeByPlaneType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $incomeByPlaneType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Income By Plane Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="incomeByPlaneTypes form large-10 medium-9 columns">
    <?= $this->Form->create($incomeByPlaneType); ?>
    <fieldset>
        <legend><?= __('Edit Income By Plane Type') ?></legend>
        <?php
            echo $this->Form->input('plane_type_id', ['options' => $planeTypes]);
            echo $this->Form->input('invoice_id', ['options' => $invoices]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
