<div class="customers view large-12 medium-9 columns">

    <fieldset>

        <?switch($invoice->status){
            case FIRST_REMINDER: ?>
                <legend><h3>1.Zahlungserinnerung</h3></legend>
                Bitte vergessen Sie nicht Ihre ausstehende Rechnung: <?=$invoice->invoice_number?> zu begleichen.<br>
                <b>Offener Betrag: <?=$invoice->value?>€.</b>;
            <?break;case SECOND_REMINDER: ?>
                <legend><h3>2.Zahlungserinnerung</h3></legend>
                Wir bitten Sie erneut um die Zahlung Ihrer ausstehenden Rechnung: <?=$invoice->invoice_number?><br>
                <b>Offener Betrag: <?=$invoice->value?>€.</b>
            <?break;case FIRST_WARNING:?>
                <legend><h3>1.Zahlungsaufforderung</h3></legend>
                Wir fordern Sie hiermit erneut auf Ihre ausstehende Rechnung: <?=$invoice->invoice_number?> zu begleichen.<br>
                <b>Offener Betrag: <?=round($invoice->value,2)?>€ (+5% Mahngebühr). </b>";
            <?break;case SECOND_WARNING:?>
                <legend><h3>2.Zahlungsaufforderung</h3></legend>
                Wir fordern Sie hiermit letztmalig auf Ihre ausstehende Rechnung: <?$invoice->invoice_number?> zu begleichen.<br>
                <b>Offener Betrag: <?=round($invoice->value,2)?>€ (+10% Mahngebühr). </b>
                <br>
                <br>
                Sollten Sie auch dieser Aufforderung nicht nachkommen, wird ein Inkassoverfahren gegen Sie eröffnet.
            <?break;case INKASSO:?>
                <legend><h3>Inkassoverfahren</h3></legend>
                Ein Inkassoverfahren wurde gegen Sie eröffnet. Das beauftragt Inkassobüro wird sich in kürze mit Ihnen in Verbindung setzen.
            <?default:break;;?>
        <?}?>


    </fieldset>
</div>



