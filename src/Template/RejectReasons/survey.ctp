<div class="customers view large-12 medium-9 columns">

    <fieldset>
        <legend><h3>Zufriedenheitsumfrage</h3></legend>

        <p><b>Dürften wir Sie um wenige Minuten Ihrer Zeit bitten?</b></p><br>
        <p>Die Hinotori Exec Charter ist stets interessiert an dem Wohlbefinden Ihrer Kunden, darum würden wir <br>
           Sie gern darum bitte uns den Grund für Ihr ablehnen des Angebots zu nennen.
        </p>

        <?= $this->Form->create(); ?>
        <? echo $this->Form->select('reason_id', $reasons); ?>
        <?=$this->Form->button(__('Abschicken'),[]) ?>
    </fieldset>
</div>
