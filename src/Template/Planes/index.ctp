<div class="customers index large-12 medium-9 columns">
    <h3>Flugzeuge</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Flugzeug hinzufügen'), ['action' => 'add']) ?></span>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('plane_name','Flugzeugname') ?></th>
                <th><?= $this->Paginator->sort('plane_number','Flugzeugnummer') ?></th>
                <th><?= $this->Paginator->sort('Flugzeugtyp') ?></th>
                <th><?= $this->Paginator->sort('Triebwerksart') ?></th>
                <th><?= $this->Paginator->sort('PAX (max)') ?></th>
                <th><?= $this->Paginator->sort('Reichweite') ?></th>
                <th style="width:250px" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($planes as $plane){ ?>
                <tr>
                    <td><?= $this->Html->Link($plane->plane_name, ['controller'=> 'Planes', 'action' => 'view', $plane->id]) ?></td>
                    <td><?= $plane->plane_number ?></td>
                    <td>
                        <?= $plane->has('plane_type') ? $this->Html->link($plane->plane_type->manufacturer.' '.$plane->plane_type->type , ['controller' => 'PlaneTypes', 'action' => 'view', $plane->plane_type->id]) : '' ?>
                    </td>

                    <td><?= h($plane->plane_type->engine_type) ?></td>
                    <td><?= h($plane->plane_type->pax) ?></td>
                    <td><?= h($this->Number->format($plane->plane_type->max_range, ['locale'=>'de-de', 'after'=>' km'])) ?></td>
                    <td>
                        <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $plane->id]) ?></span>
                        <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $plane->id]) ?></span>
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

