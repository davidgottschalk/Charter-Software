<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Airports Flights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airportsFlights form large-10 medium-9 columns">
    <?= $this->Form->create($airportsFlight); ?>
    <fieldset>
        <legend><?= __('Add Airports Flight') ?></legend>
        <?php
            echo $this->Form->input('flight_id', ['options' => $flights]);
            echo $this->Form->input('airport_id', ['options' => $airports]);
            echo $this->Form->input('flight_time');
            echo $this->Form->input('stay_duration');
            echo $this->Form->input('order_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
