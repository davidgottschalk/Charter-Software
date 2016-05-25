<div class="customers index large-12 medium-9 columns">
    <h3>Mitarbeitergruppen</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Mitarbeitergruppe hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name','Gruppenname') ?></th>
            <th class="actions"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= h($group->name) ?></td>
            <td class="actions">
                <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $group->id]) ?></span>
                <span class="actions secondary"><?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?></span>
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
