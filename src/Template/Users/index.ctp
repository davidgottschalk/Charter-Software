<div class="customers index large-12 medium-9 columns">
    <h3>Mitarbeiter</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Mitarbeiter hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username', __('Benutzername')) ?></th>
            <th><?= $this->Paginator->sort('first_name', __('Vorname')) ?></th>
            <th><?= $this->Paginator->sort('last_name', __('Nachname')) ?></th>
            <th><?= $this->Paginator->sort('created', __('hinzugefügt am')) ?></th>
            <th class="actions"><?= __('') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->first_name) ?></td>
            <td><?= h($user->last_name) ?></td>
            <td><?= h($user->created) ?></td>
            <td class="actions">
                <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $user->id]) ?></span>
                <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $user->id]) ?></span>
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
