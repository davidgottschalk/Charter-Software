<div class="planes view large-12 medium-9 columns">
    <fieldset>
            <legend class="asapblau"><?= h($plane->plane_name) ?></legend>
        <br/>
        <div class="row">
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Flugzeugname') ?></h6>
                <p><?= h($plane->plane_name) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Flugzeugnummer') ?></h6>
                <p><?= $this->Number->format($plane->plane_number, ['locale'=>'de-de', 'pattern'=>'###']) ?></p>
            </div>
            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('Flugzeugtyp') ?></h6>
                <p><?= $plane->plane_type->manufacturer.' '.$plane->plane_type->type ?></p>
            </div>

            <div class="large-2 columns strings">
                <h6 class="subheader"><?= __('erstellt') ?></h6>
                <p><?= h($plane->created->format('d.m.Y, H:i')) ?></p>
                <h6 class="subheader"><?= __('zuletzt geändert') ?></h6>
                <p><?= h($plane->modified->format('d.m.Y, H:i')) ?></p>
            </div>
            <div class="large-3 columns strings view-table"></div>
        </div>
    </fieldset>
    <span class="primary-button" style=""><?= $this->Html->link("Bearbeiten", ['action' => 'edit', $plane->id]) ?></span>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <br><br><br><br>
</div>
<fieldset>
        <legend class="asapblau"><?= h($plane->plane_type->manufacturer) ?>&nbsp;<?= h($plane->plane_type->type) ?></legend>
        <div class="actions">
        </div>
    <br/>
    <div class="row">
        <div class="large-2 columns strings">
            <h6 class="subheader"><?= __('Hersteller') ?></h6>
            <p><?= h($plane->plane_type->manufacturer) ?></p>
            <h6 class="subheader"><?= __('Typ') ?></h6>
            <p><?= h($plane->plane_type->type) ?></p>
            <h6 class="subheader"><?= __('Triebwerksart') ?></h6>
            <p><?= h($plane->plane_type->engine_type) ?></p>
        </div>
        <div class="large-2 columns strings">
            <h6 class="subheader"><?= __('Geschwindigkeit') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->speed, ['locale'=>'de-de', 'after'=>' km/h']) ?></p>
            <h6 class="subheader"><?= __('Max Reichweite') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->max_range, ['locale'=>'de-de', 'after'=>' km']) ?></p>
            <h6 class="subheader"><?= __('Triebwerksanzahl') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->engine_count) ?></p>
        </div>
        <div class="large-2 columns strings">
            <h6 class="subheader"><?= __('Cockpitpersonal (max)') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->flight_crew) ?></p>
            <h6 class="subheader"><?= __('Kabinenpersonal (max)') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->cabin_crew) ?></p>
            <h6 class="subheader"><?= __('Pax') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->pax) ?></p>
        </div>
        <div class="large-2 columns strings">
            <h6 class="subheader"><?= __('Kosten / Stunde') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->hourly_cost, ['locale'=>'de-de', 'places'=>2, 'after'=>' Euro']) ?></p>
            <h6 class="subheader"><?= __('jährliche Fixkosten') ?></h6>
            <p><?= $this->Number->format($plane->plane_type->annual_fixed_cost, ['locale'=>'de-de', 'places'=>2, 'after'=>' Euro']) ?></p>
        </div>
        <div class="large-2 columns strings">
        </div>
    </div>

</fieldset>

<center>
<div class="actions primary">
<?php
?></center></div>
    </div></div>
</div><br/>
