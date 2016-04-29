<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Users Flight'), ['action' => 'edit', $usersFlight->flight_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Flight'), ['action' => 'delete', $usersFlight->flight_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFlight->flight_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Flights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Flight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usersFlights view large-10 medium-9 columns">
    <h2><?= h($usersFlight->flight_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Flight') ?></h6>
            <p><?= $usersFlight->has('flight') ? $this->Html->link($usersFlight->flight->id, ['controller' => 'Flights', 'action' => 'view', $usersFlight->flight->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $usersFlight->has('user') ? $this->Html->link($usersFlight->user->id, ['controller' => 'Users', 'action' => 'view', $usersFlight->user->id]) : '' ?></p>
        </div>
    </div>
</div>
