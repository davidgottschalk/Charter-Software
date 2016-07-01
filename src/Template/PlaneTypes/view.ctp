<div class="planeTypes view large-12 medium-9 columns">
    <fieldset>
        <legend class="asapblau"><?= h($planeType->manufacturer) ?>&nbsp;<?= h($planeType->type) ?></legend>
        <div class="actions primary asapblau">
            <?= $this->Html->Link(__('Flugzeugtyp bearbeiten'), ['action' => 'edit', $planeType->id]) ?>
        </div>
        <br/>
        <div class="row">
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Hersteller') ?></h6>
                <p><?= h($planeType->manufacturer) ?></p>
                <h6 class="subheader"><?= __('Typ') ?></h6>
                <p><?= h($planeType->type) ?></p>
                <h6 class="subheader"><?= __('Triebwerksart') ?></h6>
                <p><?= h($planeType->engine_type) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Geschwindigkeit') ?></h6>
                <p><?= $this->Number->format($planeType->speed, ['locale'=>'de-de', 'after'=>' km/h']) ?></p>
                <h6 class="subheader"><?= __('Max Reichweite') ?></h6>
                <p><?= $this->Number->format($planeType->max_range, ['locale'=>'de-de', 'after'=>' km']) ?></p>
                <h6 class="subheader"><?= __('Triebwerksanzahl') ?></h6>
                <p><?= $this->Number->format($planeType->engine_count) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Cockpitpersonal (max)') ?></h6>
                <p><?= $this->Number->format($planeType->flight_crew) ?></p>
                <h6 class="subheader"><?= __('Kabinenpersonal (max)') ?></h6>
                <p><?= $this->Number->format($planeType->cabin_crew) ?></p>
                <h6 class="subheader"><?= __('Pax') ?></h6>
                <p><?= $this->Number->format($planeType->pax) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Kosten / Stunde') ?></h6>
                <p><?= $this->Number->format($planeType->hourly_cost, ['locale'=>'de-de', 'places'=>2, 'after'=>' Euro']) ?></p>
                <h6 class="subheader"><?= __('jährliche Fixkosten') ?></h6>
                <p><?= $this->Number->format($planeType->annual_fixed_cost, ['locale'=>'de-de', 'places'=>2, 'after'=>' Euro']) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('erstellt') ?></h6>
                <p><?= h($planeType->created->format('d.m.Y, H:i')) ?></p>
                <h6 class="subheader"><?= __('zuletzt geändert') ?></h6>
                <p><?= h($planeType->modified->format('d.m.Y, H:i')) ?></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="large-3 columns strings" style="text-align:center; padding-bottom:20px">
            <?=$this->Html->image( 'type_'.$planeType->id.'.jpg', ['style'=>'height:150px;'] )?>
            </div>
        </div>
    </fieldset>
    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $planeType->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <br><br><br><br>
</div>
<div class="related row">
    <div class="column large-12">
    <br/><h4 class="subheader"><?= __('Flugzeuge dieses Typs') ?></h5>
    <?php if (!empty($planeType->planes)){ ?>
    <table cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <th><?= __('Flugzeugname') ?></th>
                <th><?= __('Flugzeugnummer') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Aktionen') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($planeType->planes as $planes){ ?>
            <tr>
                <td><?= $this->Html->link($planes->plane_name, ['controller'=>'Planes', 'action'=>'view', $planes->id]) ?></td>
                <td><?= h($planes->plane_number) ?></td>
                <td><?= h($planes->created) ?></td>
                <td><?= h($planes->modified) ?></td>
                <td class="actions">
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['controller' => 'Planes', 'action' => 'view', $planes->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['controller' => 'Planes', 'action' => 'edit', $planes->id]) ?></span>
                </td>
            </tr>

            <? } ?>
        </tbody>
    </table>
    <? } ?>
    <br/>
    </div>
</div>
