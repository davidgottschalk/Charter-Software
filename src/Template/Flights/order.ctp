<div class="customers view large-12 medium-9 columns">
    <br><br>
        <h2 id="asapblau">Reise Buchen</h2>
        <hr>
        <br>
         <?if(isset($unavailableReasons)){?>
                <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                    <div class="large-6 columns">
                        <?=$unavailableReasons?>
                     </div>
                </div>
            <?}?>
        <br>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#klassik" aria-controls="klassik" role="tab" data-toggle="tab">Klassik</a></li>
                <li role="presentation"><a href="#timeCharter" aria-controls="timeCharter" role="tab" data-toggle="tab">Zeitcharter</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="klassik"> <!-- klassik -->
                    <?= $this->Form->create(); ?>
                    <input style="visibility:hidden" name="mode" value="classicCharter"></input>
                    <br>
                    <?if(isset($inputErrors['startDate'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-6 columns">
                                <?=$inputErrors['startDate']?>
                             </div>
                        </div>
                    <?}?>
                    <fieldset>
                        <legend><h3>Zeitraum</h3></legend>
                        <div>
                            <p>Wann soll Ihr Flugzeug starten?</p>
                            <div class="large-3 columns">
                                <? echo $this->Form->input('startDate',['class' => 'datetimepicker', 'label' => 'Von']); ?>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend><h3>Personen</h3></legend>
                        <p>Wieviele Personen treten die Reisen an?</p>
                        <div class="large-3 columns">
                            <? echo $this->Form->select('pax',[1,2,3,4,5,6,7,8], ['label' => 'Passagiere']); ?>
                        </div>
                    </fieldset>

                    <?if(isset($inputErrors['country'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-6 columns">
                                <?=$inputErrors['country']?>
                             </div>
                        </div>
                    <?}?>
                    <?if(isset($inputErrors['airport'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-6 columns">
                                <?=$inputErrors['airport']?>
                             </div>
                        </div>
                    <?}?>
                    <fieldset>
                        <legend><h3>Stationen</h3></legend>
                        <p>Welche Stationen möchten Sie anfliegen. <br> Bitte beachten Sie das die Verfügbarkeitsprüfung erst am Ende der Erfassung erfolgt. </p>
                        <p>Insofern Sie Zwischenstationen einplane, jedoch keine Aufenthaltsdauer angeben,<br> wird von einem Minimum von 45 Minuten ausgegangen um das Flugzeug neu zu betanken und zu beladen. </p>
                        <div class="row firstStation">
                            <hr>
                            <div class="large-2 columns">
                                <p>Start</p>
                            </div>
                            <div class="large-3 columns">
                                <? echo $this->Form->select('country[]', $countries ,['default' => 0, 'class' => 'country']); ?>
                            </div>
                            <div class="airport large-3 columns hiddenDiv">
                                <? echo $this->Form->select('airport[]', [] ,['default' => 0]); ?>
                            </div>
                            <div class="large-3 columns">
                            </div>
                        </div>
                        <div class="row stationAdd">
                            <hr>
                            <div class="large-6 columns ">
                                <span class="secondary-button-but-no-button" >Station hinzufügen</span>
                            </div>
                        </div>
                        <div class="row lastStation">
                            <hr>
                            <div class="large-2 columns">
                                <p>Ziel</p>
                            </div>
                            <div class="large-3 columns">
                                <? echo $this->Form->select('country[]', $countries ,['default' => 0, 'class' => 'country']); ?>
                            </div>
                            <div class="airport large-3 columns hiddenDiv">
                                <? echo $this->Form->select('airport[]', [] ,['default' => 0]); ?>
                            </div>
                            <div class="large-3 columns">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><h3>Sonderwünsche</h3></legend>
                        <div class="large-3 columns">
                            <? echo $this->Form->label('Flugzeug'); ?>
                            <? echo $this->Form->select('plane',$planes); ?>
                            <? echo $this->Form->label('Catering'); ?>
                            <? echo $this->Form->select('catering',['0' => 'Bitte wählen','1' => 'Economy','2' => 'VIP', '3' => 'Vegan']); ?>
                            <? echo $this->Form->label('zuästzliche Flugbegleiter'); ?>
                            <? echo $this->Form->select('additionalAttendants',['Bitte wählen','1','2','3']); ?>
                        </div>
                        <div class="large-3 columns">

                        </div>
                        <div class="large-3 columns"></div>
                        <div class="large-3 columns"></div>
                    </fieldset>

                <?= $this->Form->button('Anfrage abschicken') ?>
                <?= $this->Form->end() ?>

                </div> <!-- klassik -->
                <div role="tabpanel" class="tab-pane" id="timeCharter"> <!-- Zeitcharter -->
                    <?= $this->Form->create(); ?>
                    <input style="visibility:hidden" name="mode" value="timeCharter"></input>

                    <br>
                    <?if(isset($inputErrors['startDate'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-6 columns">
                                <?=$inputErrors['startDate']?>
                             </div>
                        </div>
                    <?}?>
                    <?if(isset($inputErrors['endDate'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-6 columns">
                                <?=$inputErrors['endDate']?>
                             </div>
                        </div>
                    <?}?>
                    <fieldset>
                        <legend><h3>Zeitraum</h3></legend>
                        <p>Wann soll Ihr Flugzeug starten bzw. wann wollen sie wieder landen?</p>
                        <div class="large-3 columns">
                            <? echo $this->Form->input('startDate',['class' => 'datetimepicker', 'label' => 'Von']); ?>
                        </div>
                        <div class="large-3 columns">
                            <? echo $this->Form->input('endDate',['class' => 'datetimepicker', 'label' => 'Bis']); ?>
                        </div>
                        <div class="large-3 columns">

                        </div>
                        <div class="large-3 columns"></div>
                    </fieldset>
                    <fieldset>
                        <legend><h3>Sonderwünsche</h3></legend>
                        <div class="large-3 columns">
                            <? echo $this->Form->label('Flugzeug'); ?>
                            <? echo $this->Form->select('wishedPlaneID',$planes); ?>
                            <? echo $this->Form->label('Catering'); ?>
                            <? echo $this->Form->select('catering',['0' => 'Bitte wählen','1' => 'Economy','2' => 'VIP', '3' => 'Vegan']); ?>
                            <? echo $this->Form->label('zuästzliche Flugbegleiter'); ?>
                            <? echo $this->Form->select('additionalAttendants',['Bitte wählen','1','2','3']); ?>
                        </div>
                        <div class="large-3 columns">

                        </div>
                        <div class="large-3 columns"></div>
                        <div class="large-3 columns"></div>
                    </fieldset>

                    <?= $this->Form->button('Anfrage abschicken') ?>
                    <?= $this->Form->end() ?>
                </div> <!-- Zeitcharter -->
            </div>
        <div>

        <div class="newStation" style="visibility:hidden">
            <div class="row">
                <hr>
                <div class="large-2 columns">
                    <p>Zwischenstation</p>
                </div>
                <div class="large-3 columns">
                    <? echo $this->Form->select("country[]", $countries ,["default" => 0, "class" => "country"]); ?>
                </div>
                <div class="airport large-3 columns hiddenDiv">
                    <? echo $this->Form->select("airport[]", [] ,["default" => 0]); ?>
                </div>
                <div class="large-2 columns">
                    <? echo $this->Form->input('stayDuration[]',['label' => '','placeholder' => 'Aufenthaltsdauer', 'default' => 0, 'style' => 'width:150px']); ?>
                </div>
                <div class="large-1 columns pull-left" style="padding-top:5px">
                    Stunde(n)
                </div>
             </div>
        </div>

    </div>



</div>


<script type="text/javascript">


    $('.secondary-button-but-no-button').on('click', function() {

        newStation = $(document).find('.newStation').clone();

        $( newStation ).insertBefore( $(document).find('.stationAdd') ).css("visibility", "visible").addClass('newStationInserted').removeClass('newStation');
    });



    $('#klassik').on('change', 'select.country', function() {

        var countryId = this.value;
        var stationRow = $(this).parent().parent();

        if(countryId != 0){

            stationRow.find('div.hiddenDiv').css( "visibility", "visible" );

            var countries= <?php echo json_encode($countries); ?>;
            $.ajax({
                type: "POST",
                url: '<?=$this->Url->build(["action"=>"getAirportsByCountry"])?>',
                data: {
                    country: countries[countryId]
                },
                success: function(data, textStatus, jqXHR){

                    // console.log(data);
                    console.log(stationRow);


                    stationRow.find('div.airport select').empty();
                    $.each(JSON.parse(data), function(key, airport) {

                        // console.log(key);
                        console.log(airport);
                        stationRow.find('div.airport select').append('<option value="'+key+'">'+airport+'</option>');
                    });

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseText);
                }
            })

        }else{
            $(this).parent().parent().find('div.airport').css( "visibility", "hidden" );
        }

    });

    var date = new Date();
    $('.datetimepicker').datetimepicker({
        format: 'DD.MM.YYYY HH:mm:ss',
        // startDate : '+0d',
        showClose: true,
        // startDate: '+0d'
    });

</script>
