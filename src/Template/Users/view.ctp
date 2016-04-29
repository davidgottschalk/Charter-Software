<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($user->last_name) ?></p>
            <h6 class="subheader"><?= __('Street') ?></h6>
            <p><?= h($user->street) ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= h($user->country) ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Position') ?></h6>
            <p><?= h($user->position) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Postal Code') ?></h6>
            <p><?= $this->Number->format($user->postal_code) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($user->status) ?></p>
            <h6 class="subheader"><?= __('Payment') ?></h6>
            <p><?= $this->Number->format($user->payment) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Exit Date') ?></h6>
            <p><?= h($user->exit_date) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Flights') ?></h4>
    <?php if (!empty($user->flights)): ?>
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
        <?php foreach ($user->flights as $flights): ?>
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
