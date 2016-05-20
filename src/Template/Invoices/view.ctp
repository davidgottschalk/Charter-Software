
<div class="invoices view large-10 medium-9 columns">
    <h2><?= "Rechnungnummer ".h($invoice->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Flugnummer') ?></h6>
            <p><?= $invoice->has('flight') ? $this->Html->link($invoice->flight->id, ['controller' => 'Flights', 'action' => 'view', $invoice->flight->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Summe') ?></h6>
            <p><?= $this->Number->format($invoice->value) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($invoice->status) ?></p>
        </div>


        <div class="large-2 columns strings">
            <h6 class="subheader"><?= __('Termin') ?></h6>
            <p><?= h($invoice->due_date) ?></p>
        </div>
        <div class="large-2 columns strings"></div>
    </div>
</div>
