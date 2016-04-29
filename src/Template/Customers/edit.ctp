<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customer Types'), ['controller' => 'CustomerTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Type'), ['controller' => 'CustomerTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flights'), ['controller' => 'Flights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flight'), ['controller' => 'Flights', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customers form large-10 medium-9 columns">
    <?= $this->Form->create($customer); ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('company');
            echo $this->Form->input('street');
            echo $this->Form->input('postal_code');
            echo $this->Form->input('country');
            echo $this->Form->input('customer_type_id', ['options' => $customerTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
