<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Plane Type'), ['action' => 'edit', $planeType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Plane Type'), ['action' => 'delete', $planeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planeType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plane Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Planes'), ['controller' => 'Planes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plane'), ['controller' => 'Planes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="planeTypes view large-10 medium-9 columns">
    <h2><?= h($planeType->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Manufacturer') ?></h6>
            <p><?= h($planeType->manufacturer) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($planeType->type) ?></p>
            <h6 class="subheader"><?= __('Engine Type') ?></h6>
            <p><?= h($planeType->engine_type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($planeType->id) ?></p>
            <h6 class="subheader"><?= __('Speed') ?></h6>
            <p><?= $this->Number->format($planeType->speed) ?></p>
            <h6 class="subheader"><?= __('Max Range') ?></h6>
            <p><?= $this->Number->format($planeType->max_range) ?></p>
            <h6 class="subheader"><?= __('Pax') ?></h6>
            <p><?= $this->Number->format($planeType->pax) ?></p>
            <h6 class="subheader"><?= __('Engine Count') ?></h6>
            <p><?= $this->Number->format($planeType->engine_count) ?></p>
            <h6 class="subheader"><?= __('Hourly Cost') ?></h6>
            <p><?= $this->Number->format($planeType->hourly_cost) ?></p>
            <h6 class="subheader"><?= __('Annual Fixed Cost') ?></h6>
            <p><?= $this->Number->format($planeType->annual_fixed_cost) ?></p>
            <h6 class="subheader"><?= __('Flight Crew') ?></h6>
            <p><?= $this->Number->format($planeType->flight_crew) ?></p>
            <h6 class="subheader"><?= __('Cabin Crew') ?></h6>
            <p><?= $this->Number->format($planeType->cabin_crew) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($planeType->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($planeType->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Planes') ?></h4>
    <?php if (!empty($planeType->planes)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Plane Name') ?></th>
            <th><?= __('Plane Number') ?></th>
            <th><?= __('Plane Type Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($planeType->planes as $planes): ?>
        <tr>
            <td><?= h($planes->id) ?></td>
            <td><?= h($planes->plane_name) ?></td>
            <td><?= h($planes->plane_number) ?></td>
            <td><?= h($planes->plane_type_id) ?></td>
            <td><?= h($planes->created) ?></td>
            <td><?= h($planes->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Planes', 'action' => 'view', $planes->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Planes', 'action' => 'edit', $planes->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Planes', 'action' => 'delete', $planes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planes->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
