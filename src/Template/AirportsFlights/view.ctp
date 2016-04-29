<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Airports Flight'), ['action' => 'edit', $airportsFlight->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Airports Flight'), ['action' => 'delete', $airportsFlight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $airportsFlight->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Airports Flights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airports Flight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Airports'), ['controller' => 'Airports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Airport'), ['controller' => 'Airports', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="airportsFlights view large-10 medium-9 columns">
    <h2><?= h($airportsFlight->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Flight') ?></h6>
            <p><?= $airportsFlight->has('flight') ? $this->Html->link($airportsFlight->flight->id, ['controller' => 'Flights', 'action' => 'view', $airportsFlight->flight->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Airport') ?></h6>
            <p><?= $airportsFlight->has('airport') ? $this->Html->link($airportsFlight->airport->name, ['controller' => 'Airports', 'action' => 'view', $airportsFlight->airport->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($airportsFlight->id) ?></p>
            <h6 class="subheader"><?= __('Flight Time') ?></h6>
            <p><?= $this->Number->format($airportsFlight->flight_time) ?></p>
            <h6 class="subheader"><?= __('Stay Duration') ?></h6>
            <p><?= $this->Number->format($airportsFlight->stay_duration) ?></p>
            <h6 class="subheader"><?= __('Order Number') ?></h6>
            <p><?= $this->Number->format($airportsFlight->order_number) ?></p>
        </div>
    </div>
</div>
