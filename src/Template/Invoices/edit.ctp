
<div class="invoices form large-10 medium-9 columns">
    <?= $this->Form->create($invoice); ?>
    <fieldset>
        <legend class="asapblau">Rechnungsnummer <?= h($invoice->invoice_number) ?> bearbeiten</legend>
        <?php
            echo $this->Form->input('flight_id', array('label'=>'Flugnummer','disabled' => 'disabled'));
            echo $this->Form->input('due_date', array('label'=>'Termin'));
            echo $this->Form->input('value', array('label'=>'Summe'));
            echo $this->Form->input('status', array('options' => $invoiceStatus,'label'=>'Status','disabled' => 'disabled'));
            echo $this->Form->input('automatic', ['label'=>'Automatischer Mahnlauf', 'options' => $automaticStatus,'disabled' => 'disabled']);
        ?>
    </fieldset>
    <?= $this->Form->button("Speichern") ?>

    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>

    <?if($invoice->automatic && $invoice->status != 8 && $invoice->status != 1){?>
        <span class="secondary-button"><?= $this->Html->link('Mahnwesen ausschalten', ['action' => 'deactivateAutomaticWarnings', $invoice->id],
        ['confirm' => 'Sind Sie sicher, dass Sie das Mahnwesen für diese Rechnung ausschalten möchten? Einmal abgeschalten, kann der Mahnlauf nicht mehr reaktiviert werden!']) ?></span>
    <?}?>

    <?if($invoice->status == 7){?>
        <span class="secondary-button"><?= $this->Html->link('Inkassobüro beauftragen', ['action' => 'inkasso', $invoice->id],
        ['confirm' => 'Sind Sie sicher das Sie ein Inkassoverfahren gegen den Kunden mit der Kundennummer: '.$invoice->flight->customer_id.' einleiten wollen? Dieser Vorgang kann nicht rückgängig gemacht werden!']) ?></span>
    <?}?>
    <?= $this->Form->end() ?>
</div>
