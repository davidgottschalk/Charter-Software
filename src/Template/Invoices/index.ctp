<div class="customers index large-12 medium-9 columns">
    <h3>Rechnungsübersicht</h3>
    <hr>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('flight_id', 'Flugnummer') ?></th>
                <th><?= $this->Paginator->sort('due_date', 'Termin') ?></th>
                <th><?= $this->Paginator->sort('value', 'Summe') ?></th>
                <th><?= $this->Paginator->sort('status', 'Status') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($invoices as $invoice){ ?>
            <tr>
                <td>
                    <?= $invoice->has('flight') ? $this->Html->link($invoice->flight->id, ['controller' => 'Flights', 'action' => 'view', $invoice->flight->id]) : '' ?>
                </td>
                <td><?= h($invoice->due_date) ?></td>
                <td><?= $this->Number->format($invoice->value) ?></td>
                <td><?= $this->Number->format($invoice->status) ?></td>
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
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
