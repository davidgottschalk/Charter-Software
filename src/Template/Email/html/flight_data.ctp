<div class="customers view large-12 medium-9 columns">

    <style type="text/css">
        img{width:200px;}
    </style>


    <fieldset>
        <legend><h3>Flugdaten <?=$flight['flightDatabaseObject']['flight_number']?></h3></legend>
        <div class="row">
            <div class="large-3 columns">
                <?=(!empty($flight['plane']))?'Wunschflugzeug':'Flugzeug Name';echo $flight['availablePlane']['plane_name']?>
            </div>

        </div>
        <div class="row">
            <div class="large-3 columns">
                Flugzeug Nummer : <?=$flight['availablePlane']['plane_number']?>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                Flugzeug Type : <?=$flight['planeType']['manufacturer'].' '. $flight['planeType']['type']?>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                Catering : <?if($flight['catering'] == CATERING_VEG){echo 'Vegan';}elseif($flight['catering'] == CATERING_VIP){echo 'VIP';}else{echo 'Economy';}?>
            </div>
        </div>
        <?if($flight['additionalAttendants'] != 0){?>
            <div class="row">
                <div class="large-3 columns">
                    Zusätzliche Stewardess : <?=$flight['additionalAttendants']?>
                </div>
            </div>
        <?}?>

        <br>
        <img src="cid:planeType"/>
        <br>
        <br>
        <hr>
        <h4>Zeitraum</h4>
        <div class="row">
            <div class="medium-2 columns" style="margin-top:5px;">
                <span style="font-size:9px">Von</span><br>
                <?=$this->Time->format($flight['startDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin')?>
            </div>
            <div class="medium-2 columns" style="margin-top:5px">
                <span style="font-size:9px">Bis</span><br>
                <?=(isset($flight['endDate']))?
                    $this->Time->format($flight['endDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin'):
                    $this->Time->format($flight['planeType']['calculatedEndDate'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                ?>
            </div>
        </div>
        <br>
        <br>
        <? if( isset($flight['stations']) ) {?>
            <hr>
            <h4>Stationen</h4>
            <?$i = 1;foreach($flight['stations'] as $stations){ ?>

                <div style="margin-bottom:20px">
                    <h3><?=$i?>.Station</h3>
                    <div class="medium-2 columns" style="margin-top:5px;">
                        <span style="font-size:9px">Reisezeit</span><br>
                        <?if(!empty($stations['arrivalTime'])){
                            echo gmdate('H:i',($stations['flightTime']*60));
                        }else{
                            echo "<i style='font-size:12px'>Start Flughafen</i>";
                        }?>
                    </div>
                    <div class="medium-2 columns" style="margin-top:5px;;">
                        <span style="font-size:9px">Ankunft</span><br>
                        <?if(!empty($stations['arrivalTime'])){
                            echo $this->Time->format($stations['arrivalTime'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                        }else{
                            echo "<i style='font-size:12px'>Start Flughafen</i>";
                        }?>
                    </div>
                    <div class="medium-3 columns" style="margin-top:5px;">
                        <span style="font-size:9px">Flughafen, Land</span><br>
                        <?=$stations['airport'].' ,'.$stations['country']?>
                    </div>
                    <div class="medium-2 columns" style="margin-top:5px;">
                        <span style="font-size:9px">Aufenthaltsdauer</span><br>
                        <?=$stations['stayDuration'].' Stunde(n)'?>
                    </div>
                    <div class="medium-2 columns" style="margin-top:5px;">
                        <span style="font-size:9px">Abflugzeit</span><br>
                        <? if(!empty($stations['departuresTime'])){
                            echo $this->Time->format($stations['departuresTime'],'dd.MM.yyyy HH:mm',false,'europe/berlin');
                        }else{
                            echo "<i style='font-size:12px'>Ziel Flughafen</i>";
                        }?>
                    </div>
                </div>
            <?$i++;}?>
        <?}?>
        <br>
    </fieldset>
</div>
