<div class="customers index large-12 medium-9 columns">
    <h3>Flugzeug Typen</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Flugzeug Typ hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('manufacturer','Hersteller') ?></th>
                <th><?= $this->Paginator->sort('type','Flugzeugtyp') ?></th>
                <th><?= $this->Paginator->sort('speed','Geschwindigkeit (max)') ?></th>
                <th><?= $this->Paginator->sort('max_range','Reichweite (max)') ?></th>
                <th><?= $this->Paginator->sort('pax','PAX (max)') ?></th>
                <th><?= $this->Paginator->sort('engine_type','Triebwerksart') ?></th>
                <th style="width:250px" class="actions"></th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($planeTypes as $planeType){ ?>
            <tr>
                <td><?= h($planeType->manufacturer) ?></td>
                <td><?= $this->Html->Link($planeType->type, ['action'=>'view', $planeType->id]) ?></td>
                <td><?= $this->Number->format($planeType->speed, ['locale'=>'de-de', 'after'=>' km/h']) ?></td>
                <td><?= $this->Number->format($planeType->max_range, ['locale'=>'de-de', 'after'=>' km']) ?></td>
                <td><?= $this->Number->format($planeType->pax) ?></td>
                <td><?= h($planeType->engine_type) ?></td>
                <td class="actions">
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $planeType->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $planeType->id]) ?></span>
                    <span class="actions secondary"><?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $planeType->id], ['confirm' => __('Sind Sie sicher, dass Sie den Flugzeugtyp "{0}" löschen möchten?', $planeType->manufacturer.' '.$planeType->type)]) ?></span>
                </td>
            </tr>

        <? } ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('zurück')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('weiter') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
