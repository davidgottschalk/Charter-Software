<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Plane'), ['action' => 'edit', $plane->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plane'), ['action' => 'delete', $plane->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plane->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Planes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plane Types'), ['controller' => 'PlaneTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['controller' => 'PlaneTypes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planes view large-10 medium-9 columns">
    <h2><?= h($plane->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Plane Name') ?></h6>
            <p><?= h($plane->plane_name) ?></p>
            <h6 class="subheader"><?= __('Plane Type') ?></h6>
            <p><?= $plane->has('plane_type') ? $this->Html->link($plane->plane_type->id, ['controller' => 'PlaneTypes', 'action' => 'view', $plane->plane_type->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($plane->id) ?></p>
            <h6 class="subheader"><?= __('Plane Number') ?></h6>
            <p><?= $this->Number->format($plane->plane_number) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($plane->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($plane->modified) ?></p>
        </div>
    </div>
</div>
