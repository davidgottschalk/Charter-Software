<div class="customers view large-12 medium-9 columns">

    <fieldset>
        <legend><h3>Rechnung <?=$flight['invoice']['invoice_number']?></h3></legend>
        <div class="row">
            <div class="large-2 columns">
                + Flugzeug Kosten :
            </div>
             <div class="large-2 columns" style="text-align:right;">
                <?=$flight['costs']['planeCost'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <div class="row">
            <div class="large-2 columns">
                + Crew Kosten :
            </div>
             <div class="large-2 columns" style="text-align:right;">
                <?=$flight['costs']['crewCost'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <div class="row">
            <div class="large-2 columns" style="font-size:12px">
                <i>Davon Pilot</i>
            </div>
             <div class="large-2 columns" style="text-align:right; font-size:12px;">
                <?=$flight['costs']['pilotCost'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <div class="row">
            <div class="large-2 columns" style="font-size:12px">
                <i>Davon Co-Pilot</i>
            </div>
             <div class="large-2 columns" style="text-align:right; font-size:12px;">
                <?=$flight['costs']['copilotCost'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <div class="row">
            <div class="large-2 columns" style="font-size:12px">
                <i>Davon Flugbegleiter</i>
            </div>
             <div class="large-2 columns" style="text-align:right; font-size:12px;">
                <?=$flight['costs']['attendantsCost'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>

        <hr>

        <div class="row">
            <div class="large-2 columns">
                Zwischensumme
            </div>
             <div class="large-2 columns" style="text-align:right;">
                <?=$flight['costs']['summeCrewPlane'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <?if(isset($flight['costs']['unknowCredibilityCost'])){?>
            <div class="row">
                <div class="large-2 columns" style="font-size:12px;">
                    + Risikozuschlag (5%)
                </div>
                 <div class="large-2 columns" style="text-align:right; font-size:12px;">
                    <?=$flight['costs']['unknowCredibilityCost'].' €'?>
                </div>
                <div class="large-8 columns"></div>
            </div>
        <?}?>
        <hr>

        <div class="row">
            <div class="large-2 columns" style="font-size:16px">
                (Netto) Preis
            </div>
             <div class="large-2 columns" style="text-align:right; text-align:right;">
                <?=$flight['costs']['nettoSumme'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <div class="row">
            <div class="large-2 columns" style="font-size:12px;">
                + Steuern (19%)
            </div>
             <div class="large-2 columns" style="font-size:12px; text-align:right;">
                <?=$flight['costs']['tax'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>

        <hr>
        <div class="row">
            <div class="large-2 columns" style="font-size:18px;">
                zu zahlender Betrag
            </div>
             <div class="large-2 columns" style="text-align:right;">
                <?=$flight['costs']['bruttoSumme'].' €'?>
            </div>
            <div class="large-8 columns"></div>
        </div>
        <?
        echo $this->Html->link(
                'Zum bezahlen bitte hier klicken',
                'http://david.webdev.bancos.com/c/flights/payed?invoice_number='.$flight['invoice']['invoice_number'].'&flight_number='.$flight['flightDatabaseObject']['flight_number'].'&invoice_id='.$flight['invoice']['id'],
                ['target' => '_blank']
        );
        ?>
    </fieldset>
</div>
