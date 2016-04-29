<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $airport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $airport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Airports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airports form large-10 medium-9 columns">
    <?= $this->Form->create($airport); ?>
    <fieldset>
        <legend><?= __('Edit Airport') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            echo $this->Form->input('flights._ids', ['options' => $flights]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
