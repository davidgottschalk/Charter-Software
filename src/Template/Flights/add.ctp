<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Flights'), ['action' => 'index']) ?></li>
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
<div class="flights form large-10 medium-9 columns">
    <?= $this->Form->create($flight); ?>
    <fieldset>
        <legend><?= __('Add Flight') ?></legend>
        <?php
            echo $this->Form->input('flight_number');
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('plane_id', ['options' => $planes]);
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('status');
            echo $this->Form->input('airports._ids', ['options' => $airports]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
