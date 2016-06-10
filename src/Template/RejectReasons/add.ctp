<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Reject Reasons'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="rejectReasons form large-10 medium-9 columns">
    <?= $this->Form->create($rejectReason); ?>
    <fieldset>
        <legend><?= __('Add Reject Reason') ?></legend>
        <?php
            echo $this->Form->input('reason_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
