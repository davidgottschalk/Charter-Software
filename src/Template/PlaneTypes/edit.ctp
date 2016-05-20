    <div class="planeTypes view large-12 medium-9 columns">
    <?= $this->Form->create($planeType); ?>
    <fieldset>
        <legend class="asapblau"><?= __('Flugzeugtyp bearbeiten') ?></legend>
        <div class"actions">
        </div>
    <br/>
    <div class="row">
    <div class="large-3 columns strings">
        <?php
            echo $this->Form->input('manufacturer', array('label'=>'Hersteller'));
            echo $this->Form->input('type', array('label'=>'Typ'));
            echo $this->Form->input('engine_type', array('options'=>array('Jet'=>'Jet', 'Turbopropp'=>'Turbopropp'), 'label'=>'Triebwerksart'));
        ?></div>
    <div class="large-3 columns strings">
        <?php
            echo $this->Form->input('speed', array('label'=>'Geschwindigkeit'));
            echo $this->Form->input('max_range', array('label'=>'Reichweite'));
            echo $this->Form->input('engine_count', array('label'=>'Anzahl Triebwerke'));
        ?></div>
    <div class="large-3 columns strings">
        <?php
            echo $this->Form->input('flight_crew', array('label'=>'Cockpitpersonal (max)'));
            echo $this->Form->input('cabin_crew', array('label'=>'Kabinenpersonal (max)'));
            echo $this->Form->input('pax');
        ?></div>
    <div class="large-2 columns strings">
        <?php
            echo $this->Form->input('hourly_cost', array('label'=>'Kosten / Stunde'));
            echo $this->Form->input('annual_fixed_cost', array('label'=>'jährliche Fixkosten'));
        ?></div></div></div>
    </fieldset>
    <div class="planeTypes form large-12 medium-9 columns">
    <?= $this->Form->button(__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>
    <?= $this->Form->end() ?>
 </div>
