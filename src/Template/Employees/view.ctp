<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="employees view large-10 medium-9 columns">
    <h2><?= h($employee->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($employee->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($employee->last_name) ?></p>
            <h6 class="subheader"><?= __('Street') ?></h6>
            <p><?= h($employee->street) ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= h($employee->country) ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($employee->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($employee->password) ?></p>
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $employee->has('group') ? $this->Html->link($employee->group->name, ['controller' => 'Groups', 'action' => 'view', $employee->group->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($employee->id) ?></p>
            <h6 class="subheader"><?= __('Postal Code') ?></h6>
            <p><?= $this->Number->format($employee->postal_code) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($employee->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($employee->created) ?></p>
            <h6 class="subheader"><?= __('Exit Date') ?></h6>
            <p><?= h($employee->exit_date) ?></p>
        </div>
    </div>
</div>
