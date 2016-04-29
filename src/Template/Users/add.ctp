<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('street');
            echo $this->Form->input('country');
            echo $this->Form->input('postal_code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('group_id', ['options' => $groups]);
            echo $this->Form->input('position');
            echo $this->Form->input('status');
            echo $this->Form->input('payment');
            echo $this->Form->input('exit_date');
            // echo $this->Form->input('flights._ids', ['options' => $flights]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
