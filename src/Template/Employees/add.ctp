<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employees form large-10 medium-9 columns">
    <?= $this->Form->create($employee); ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('street');
            echo $this->Form->input('country');
            echo $this->Form->input('postal_code');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('group_id', ['options' => $groups]);
            echo $this->Form->input('status');
            echo $this->Form->input('exit_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
