
<div class="invoices form large-10 medium-9 columns">
    <?= $this->Form->create($invoice); ?>
    <fieldset>
        <legend><?= 'Rechnung bearbeiten' ?></legend>
        <?php
            echo $this->Form->input('flight_id', array('label'=>'Flugnummer'));
            echo $this->Form->input('due_date', array('label'=>'Termin'));
            echo $this->Form->input('value', array('label'=>'Summe'));
            echo $this->Form->input('status', array('label'=>'Status'));
        ?>
    </fieldset>
    <?= $this->Form->button("Speichern") ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
</div>
