<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Reject Reason'), ['action' => 'edit', $rejectReason->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reject Reason'), ['action' => 'delete', $rejectReason->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rejectReason->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reject Reasons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reject Reason'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="rejectReasons view large-10 medium-9 columns">
    <h2><?= h($rejectReason->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($rejectReason->id) ?></p>
            <h6 class="subheader"><?= __('Reason Id') ?></h6>
            <p><?= $this->Number->format($rejectReason->reason_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($rejectReason->created) ?></p>
        </div>
    </div>
</div>
