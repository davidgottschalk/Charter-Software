

<div class="customers view large-12 medium-9 columns">
    <br><br>
        <h2 id="asapblau">Unser Angebot für Sie.</h2>
        <hr>
        <br>
        <?= $this->Form->create(); ?>
        <div class="large-12 columns">
            <fieldset>
                <legend><h3>Kundendaten</h3></legend>
                <div class="row">
                    <div class="large-2 columns">
                        Name, Vorname :
                    </div>
                     <div class="large-10 columns">
                        <?=$data['customer']['last_name'].', '.$data['customer']['first_name']?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        Firma :
                    </div>
                     <div class="large-10 columns">
                        <?=(isset($data['customer']['company']))?$data['customer']['company']:'<i>keine</i>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        Addresse :
                    </div>
                     <div class="large-10 columns">
                        <?=$data['customer']['street'].', '.$data['customer']['postal_code'].' '.$data['customer']['country']?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        E-Mail :
                    </div>
                     <div class="large-10 columns">
                        <?=$data['customer']['email']?>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="large-12 columns">
            <fieldset>
                <legend><h3>Flugdaten</h3></legend>
                <div class="row">
                    <div class="large-3 columns">
                        <?=(!empty($data['plane']))?'Wunschflugzeug':'Flugzeug Name';?>
                    </div>
                     <div class="large-9 columns">
                        <?=$data['availablePlane']['plane_name']?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-3 columns">
                        Flugzeug Nummer :
                    </div>
                     <div class="large-9 columns">
                        <?=$data['availablePlane']['plane_number']?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-3 columns">
                        Flugzeug Type :
                    </div>
                     <div class="large-9 columns">
                        <?=$data['planeType']['manufacturer'].' '. $data['planeType']['type']?>
                    </div>
                </div>
                <div class="row">
                    <div class="large-3 columns">
                        Catering :
                    </div>
                     <div class="large-9 columns">
                        <?if($data['catering'] == CATERING_VEG){echo 'Vegan';}elseif($data['catering'] == CATERING_VIP){echo 'VIP';}else{echo 'Economy';}?>
                    </div>
                </div>
                <?if($data['additionalAttendants'] != 0){?>
                    <div class="row">
                        <div class="large-3 columns">
                            Zusätzliche Stewardess :
                        </div>
                         <div class="large-9 columns">
                            <?=$data['additionalAttendants']?>
                        </div>
                    </div>
                <?}?>
                <br>
                <br>
                <hr>
                <h4>Zeitraum</h4>
                <div class="row">
                    <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px;">
                        <span style="font-size:9px">Von</span><br>
                        <?=$this->Time->format($data['startDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin')?>
                    </div>
                    <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px; float:left;">
                        <span style="font-size:9px">Bis</span><br>
                        <?=(isset($data['endDate']))?
                            $this->Time->format($data['endDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin'):
                            $this->Time->format($data['planeType']['calculatedEndDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                        ?>
                    </div>
                </div>
                <br>
                <? if( isset($data['stations']) ) {?>
                    <hr>
                    <h4>Stationen</h4>
                    <?foreach($data['stations'] as $stations){ ?>

                        <div class="row" style="margin-bottom:5px">
                            <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px;">
                                <span style="font-size:9px">Reisezeit</span><br>
                                <?if(!empty($stations['arrivalTime'])){
                                    echo gmdate('H:i',($stations['flightTime']*60));
                                }else{
                                    echo "<i style='font-size:12px'>Start Flughafen</i>";
                                }?>
                            </div>
                            <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px;">
                                <span style="font-size:9px">Ankunft</span><br>
                                <?if(!empty($stations['arrivalTime'])){
                                    echo $this->Time->format($stations['arrivalTime'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                                }else{
                                    echo "<i style='font-size:12px'>Start Flughafen</i>";
                                }?>
                            </div>
                            <div class="medium-3 columns" style="background-color:#ccc; margin-right:5px;">
                                <span style="font-size:9px">Flughafen, Land</span><br>
                                <?=$stations['airport'].' ,'.$stations['country']?>
                            </div>
                            <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px;">
                                <span style="font-size:9px">Aufenthaltsdauer</span><br>
                                <?=$stations['stayDuration'].' Stunde(n)'?>
                            </div>
                            <div class="medium-2 columns" style="background-color:#ccc; float:left;">
                                <span style="font-size:9px">Abflugzeit</span><br>
                                <? if(!empty($stations['departuresTime'])){
                                    echo $this->Time->format($stations['departuresTime'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                                }else{
                                    echo "<i style='font-size:12px'>Ziel Flughafen</i>";
                                }?>
                            </div>
                        </div>
                    <?}?>
                <?}?>
                <br>
            </fieldset>
        </div>

        <div class="large-12 columns">

            <fieldset>
                <legend><h3>Kostenberechung</h3></legend>
                <div class="row">
                    <div class="large-2 columns">
                        + Flugzeug Kosten :
                    </div>
                     <div class="large-2 columns" style="text-align:right;">
                        <?=$data['costs']['planeCost'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        + Crew Kosten :
                    </div>
                     <div class="large-2 columns" style="text-align:right;">
                        <?=$data['costs']['crewCost'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <div class="row">
                    <div class="large-2 columns" style="font-size:12px">
                        <i>Davon Pilot</i>
                    </div>
                     <div class="large-2 columns" style="text-align:right; font-size:12px;">
                        <?=$data['costs']['pilotCost'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <div class="row">
                    <div class="large-2 columns" style="font-size:12px">
                        <i>Davon Co-Pilot</i>
                    </div>
                     <div class="large-2 columns" style="text-align:right; font-size:12px;">
                        <?=$data['costs']['copilotCost'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <div class="row">
                    <div class="large-2 columns" style="font-size:12px">
                        <i>Davon Flugbegleiter</i>
                    </div>
                     <div class="large-2 columns" style="text-align:right; font-size:12px;">
                        <?=$data['costs']['attendantsCost'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>

                <hr>

                <div class="row">
                    <div class="large-2 columns">
                        Zwischensumme
                    </div>
                     <div class="large-2 columns" style="text-align:right;">
                        <?=$data['costs']['summeCrewPlane'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <?if(isset($data['costs']['unknowCredibilityCost'])){?>
                    <div class="row">
                        <div class="large-2 columns" style="font-size:12px;">
                            + Risikozuschlag (5%)
                        </div>
                         <div class="large-2 columns" style="text-align:right; font-size:12px;">
                            <?=$data['costs']['unknowCredibilityCost'].' €'?>
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
                        <?=$data['costs']['nettoSumme'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>
                <div class="row">
                    <div class="large-2 columns" style="font-size:12px;">
                        + Steuern (19%)
                    </div>
                     <div class="large-2 columns" style="font-size:12px; text-align:right;">
                        <?=$data['costs']['tax'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>

                <hr>
                <div class="row">
                    <div class="large-2 columns" style="font-size:18px;">
                        zu zahlender Betrag
                    </div>
                     <div class="large-2 columns" style="text-align:right;">
                        <?=$data['costs']['bruttoSumme'].' €'?>
                    </div>
                    <div class="large-8 columns"></div>
                </div>

                <!-- <hr> -->

            </fieldset>
            <fieldset>
                <legend><h3>Hinweise</h3></legend>
                <p><b>Bitte beachten Sie das eine getätigte Buchung verbindlich ist. <br> Eine Stornierung der Buchung ist nicht möglich. </b></p>
            </fieldset>
            <?if($data['customer']['customer_type_id'] == VIP || $data['customer']['customer_type_id'] == CORP){?>
                <input style="visibility:hidden; max-height:0px;" name="payed" value="0"></input><br>

                <?= $this->Form->button(__('Buchen')) ?>
                <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen",['action' => 'aboutOffer'],['confirm' => 'Sind Sie sicher das Sie diesen Vorgang beenden wollen? Alle bis hierhin getätigten Eingaben gehen verloren.'])?></span>
                <?= $this->Form->end() ?>
            <?}elseif($data['customer']['customer_type_id'] == PRE){?>
                <input style="visibility:hidden; max-height:0px" name="payed" value="1"></input>
                <fieldset style="margin-top:-20px">
                    <legend><h3>Zahlung</h3></legend>
                    <p>Um die Buchung abzuschließen werden Sie nach Klick auf "Bezahlen" an einen unserer Finanzdienstleister weitergeleitet.</p>
                </fieldset>
                <?= $this->Form->button(__('Jetzt Bezahlen'),['confirm' => 'Sind Sie sicher das Sie diese Buchung verbindlich bestätigen wollen?']) ?>
                <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen",['action' => 'aboutOffer'],['confirm' => 'Sind Sie sicher das Sie diesen Vorgang beenden wollen? Alle bis hierhin getätigten Eingaben gehen verloren.'])?></span>
                <?= $this->Form->end() ?>
            <?}?>
        </div>
    </div>



<pre style="margin-top:200px"><? print_r($data); ?></pre>
