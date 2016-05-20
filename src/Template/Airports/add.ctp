<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Airports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airports form large-10 medium-9 columns">
    <?= $this->Form->create($airport); ?>
    <fieldset>
        <legend><?= __('Add Airport') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            echo $this->Form->input('iata_faa');
            echo $this->Form->input('icao');
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('altitude');
            echo $this->Form->input('timezone');
            echo $this->Form->input('dst');
            echo $this->Form->input('timezone_db');
            echo $this->Form->input('flights._ids', ['options' => $flights]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
