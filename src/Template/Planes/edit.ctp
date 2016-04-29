<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plane->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Planes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planes form large-10 medium-9 columns">
    <?= $this->Form->create($plane); ?>
    <fieldset>
        <legend><?= __('Edit Plane') ?></legend>
        <?php
            echo $this->Form->input('plane_name');
            echo $this->Form->input('plane_number');
            echo $this->Form->input('plane_type_id', ['options' => $planeTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
