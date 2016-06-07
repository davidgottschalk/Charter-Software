<div class="customers view large-12 medium-9 columns">
    <fieldset>
        <legend class="asapblau"><?= "Rechnungnummer ".h($invoice->id) ?></legend>
        <div class="row">
            <div class="large-5 columns strings">
                <h6 class="subheader"><?= __('Flugnummer') ?></h6>
                <p><?= $invoice->has('flight') ? $this->Html->link($invoice->flight->id, ['controller' => 'Flights', 'action' => 'view', $invoice->flight->id]) : '' ?></p>
                <h6 class="subheader"><?= __('Summe') ?></h6>
                <p><?= $this->Number->format($invoice->value) ?></p>
                <h6 class="subheader"><?= __('Status') ?></h6>
                <p><?=h($invoiceStatus[$invoice->status]) ?></p>

                <h6 class="subheader"><?= __('Automatischer Mahnlauf') ?></h6>
                <p><?=h($automaticStatus[$invoice->automatic]) ?></p>
            </div>


            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Termin') ?></h6>
                <p><?= h($invoice->due_date) ?></p>
            </div>
            <div class="large-2 columns strings"></div>
        </div>
    </fieldset>
    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $invoice->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>

</div>
