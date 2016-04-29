<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Airport'), ['action' => 'edit', $airport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Airport'), ['action' => 'delete', $airport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airports view large-10 medium-9 columns">
    <h2><?= h($airport->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($airport->name) ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= h($airport->city) ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= h($airport->country) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($airport->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Flights') ?></h4>
    <?php if (!empty($airport->flights)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Flight Number') ?></th>
            <th><?= __('Customer Id') ?></th>
            <th><?= __('Plane Id') ?></th>
            <th><?= __('Start Date') ?></th>
            <th><?= __('End Date') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($airport->flights as $flights): ?>
        <tr>
            <td><?= h($flights->id) ?></td>
            <td><?= h($flights->flight_number) ?></td>
            <td><?= h($flights->customer_id) ?></td>
            <td><?= h($flights->plane_id) ?></td>
            <td><?= h($flights->start_date) ?></td>
            <td><?= h($flights->end_date) ?></td>
            <td><?= h($flights->status) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Flights', 'action' => 'view', $flights->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Flights', 'action' => 'edit', $flights->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Flights', 'action' => 'delete', $flights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flights->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
