<div class="customers index large-12 medium-9 columns">
    <h3>Rechnungsübersicht</h3>
    <hr>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('flight_id', 'Flugnummer') ?></th>
                <th><?= $this->Paginator->sort('Kundennummer') ?></th>
                <th><?= $this->Paginator->sort('due_date', 'Termin') ?></th>
                <th><?= $this->Paginator->sort('value', 'Summe') ?></th>
                <th><?= $this->Paginator->sort('status', 'Status') ?></th>
                <th><?= $this->Paginator->sort('automatic', 'Automatischer Mahnlauf') ?></th>

                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($invoices as $invoice){ ?>
            <tr>
                <td>
                    <?= $invoice->has('flight') ? $this->Html->link($invoice->flight->id, ['controller' => 'Flights', 'action' => 'view', $invoice->flight->id]) : '' ?>
                </td>
                <td>
                    <?= $invoice->has('flight') ? $this->Html->link($invoice->flight->customer_id, ['controller' => 'Customers', 'action' => 'view', $invoice->flight->customer_id]) : '' ?>
                </td>
                <td><?= h($invoice->due_date) ?></td>
                <td><?= $this->Number->currency($invoice->value, 'EUR') ?></td>
                <td><?= h($invoiceStatus[$invoice->status]) ?></td>
                <td><?= h($automaticStatus[$invoice->automatic]) ?></td>

                <td>
                    <span class="actions secondary"><?= $this->Html->link('Ansehen', ['action' => 'view', $invoice->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link('Bearbeiten', ['action' => 'edit', $invoice->id]) ?></span>
                </td>
            </tr>

        <? } ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . 'zurück') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('weiter' . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter("Seite {{page}} von {{pages}} ") ?></p>
    </div>
</div>
