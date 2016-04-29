<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planeType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planeType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Plane Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planeTypes form large-10 medium-9 columns">
    <?= $this->Form->create($planeType); ?>
    <fieldset>
        <legend><?= __('Edit Plane Type') ?></legend>
        <?php
            echo $this->Form->input('manufacturer');
            echo $this->Form->input('type');
            echo $this->Form->input('speed');
            echo $this->Form->input('max_range');
            echo $this->Form->input('pax');
            echo $this->Form->input('engine_type');
            echo $this->Form->input('engine_count');
            echo $this->Form->input('hourly_cost');
            echo $this->Form->input('annual_fixed_cost');
            echo $this->Form->input('flight_crew');
            echo $this->Form->input('cabin_crew');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
