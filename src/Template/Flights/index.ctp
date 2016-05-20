<div class="customers index large-12 medium-9 columns">
    <h3>Termine</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Termin hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('flight_number') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('plane_id') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($flights as $flight): ?>
            <tr>
                <td><?= $this->Number->format($flight->id) ?></td>
                <td><?= h($flight->flight_number) ?></td>
                <td>
                    <?= $flight->has('customer') ? $this->Html->link($flight->customer->id, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?>
                </td>
                <td>
                    <?= $flight->has('plane') ? $this->Html->link($flight->plane->id, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?>
                </td>
                <td><?= h($flight->start_date) ?></td>
                <td><?= h($flight->end_date) ?></td>
                <td><?= $this->Number->format($flight->status) ?></td>
                <td>
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $flight->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $flight->id]) ?></span>
                    <span class="actions secondary"><?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $flight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?></span>
                </td>
            </tr>

        <?php endforeach; ?>
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
