<div class="customers index large-12 medium-9 columns">
    <h3>Kundengruppe</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Kundengruppe hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name','Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($customerTypes as $customerType): ?>
        <tr>
            <td><?= h($customerType->name) ?></td>
            <td class="actions">
                <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $customerType->id]) ?></span>
                <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $customerType->id]) ?></span>
            </td>
        </tr>
    <?php endforeach; ?>
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
