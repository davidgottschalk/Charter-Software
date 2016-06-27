

<div class="customers view large-12 medium-9 columns">
    <br><br>
        <h2 id="asapblau">Unser Angebot für Sie.</h2>
        <hr>
        <br>

        <div class="large-12 columns">
            <?= $this->Form->create(); ?>
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
            <?= $this->Form->create(); ?>
            <fieldset>
                <legend><h3>Flugdaten</h3></legend>
                <div class="large-7 columns">
                    <div class="row">
                        <div class="large-3 columns">
                            Flugzeug Name,
                        </div>
                         <div class="large-9 columns">
                            <?=$data['data']['availablePlane']['plane_name']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            Flugzeug Nummer :
                        </div>
                         <div class="large-9 columns">
                            <?=$data['data']['availablePlane']['plane_number']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-3 columns">
                            Flugzeug Type :
                        </div>
                         <div class="large-9 columns">
                            <?=$data['data']['planeType']['manufacturer'].' '. $data['data']['planeType']['type']?>
                        </div>
                    </div>

                    <br>
                    <br>
                </div>
                <div class="large-5 columns">

                    ´BILD

                </div>
                <hr>
                <h4>Stationen</h4>
                <?
                    $start = true;
                    foreach($data['data']['stations'] as $stations){


                ?>


                    <div class="row">

                        <div class="medium-3 columns" style="background-color:#ccc; margin-right:5px;">
                            <span style="font-size:9px">Ankunft</span><br>
                            <?if(!empty($stations['arrivalTime'])){ echo $stations['arrivalTime']; }else{echo "<i style='font-size:12px'>Start Flughafen</i>";}?>
                        </div>


                        <div class="medium-3 columns" style="background-color:#ccc; margin-right:5px;">
                            <span style="font-size:9px">Flughafen, Land</span><br>
                            <?=$stations['airport'].' ,'.$stations['country']?>
                        </div>
                        <div class="medium-2 columns" style="background-color:#ccc; margin-right:5px;">
                            <span style="font-size:9px">Aufenthaltsdauer</span><br>
                            <?=$stations['stayDuration'].' Stunde(n)'?>
                        </div>

                        <?{?>
                            <div class="medium-3 columns" style="background-color:#ccc;  float:left;">
                                <span style="font-size:9px">Abflugzeit</span><br>
                                <? if(!empty($stations['departuresTime'])){ echo $stations['departuresTime']; }else{echo "<i style='font-size:12px'>Ziel Flughafen</i>";}?>
                            </div>
                        <?}?>

                    </div>
                    <br>
                    <!-- <hr> -->

                <?
                        $start = false;
                    }
                ?>
            </fieldset>
        </div>






        <hr>
        <span class="primary-button" style=""><?= $this->Html->link("Buchen", ['action' => 'abortCustomerCredentials']) ?></span>
        <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'abortCustomerCredentials']) ?></span>


</div>
<br>
<br>
<br>
<br>

<pre><? print_r($data); ?></pre>
