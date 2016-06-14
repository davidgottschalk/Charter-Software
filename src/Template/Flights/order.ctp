<div class="customers view large-12 medium-9 columns">

<br><br>
    <h2 id="asapblau">Reise Buchen</h2>
    <hr>
    <br><br>
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
                <br>
                <fieldset>
                    <legend><h3>Zeitraum</h3></legend>
                    <p>Wann soll Ihr Flugzeug starten?</p>
                    <div class="large-3 columns">
                        <? echo $this->Form->input('start_time',['class' => 'datetimepicker', 'label' => 'Von']); ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><h3>Personen</h3></legend>
                    <p>Wieviele Personen treten die Reisen an?</p>
                    <div class="large-3 columns">
                        <? echo $this->Form->select('pax',[1,2,3,4,5,6,7,8], ['label' => 'Passagiere']); ?>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><h3>Stationen</h3></legend>
                    <p>Welche Stationen möchten Sie anfliegen. <br> Bitte beachten Sie das die Verfügbarkeitsprüfung erst am Ende der Erfassung erfolgt. </p>
                    <div class="row firstStation">
                        <hr>
                        <div class="large-2 columns">
                            <p>Start</p>
                        </div>
                        <div class="large-3 columns">
                            <? echo $this->Form->select('country', $countries ,['default' => 0, 'class' => 'country']); ?>
                        </div>
                        <div class="airport large-3 columns hiddenDiv">
                            <? echo $this->Form->select('airport', [] ,['default' => 0]); ?>
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
                            <? echo $this->Form->select('country', $countries ,['default' => 0, 'class' => 'country']); ?>
                        </div>
                        <div class="airport large-3 columns hiddenDiv">
                            <? echo $this->Form->select('airport', [] ,['default' => 0]); ?>
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
                        <? echo $this->Form->select('attendants',['Bitte wählen','1','2','3']); ?>
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
                <br>
                <fieldset>
                    <legend><h3>Zeitraum</h3></legend>
                    <div class="large-3 columns">
                        <? echo $this->Form->input('first_name',['class' => 'datetimepicker', 'label' => 'Von']); ?>
                    </div>
                    <div class="large-3 columns">
                        <? echo $this->Form->input('first_name',['class' => 'datetimepicker', 'label' => 'Bis']); ?>
                    </div>
                    <div class="large-3 columns">

                    </div>
                    <div class="large-3 columns"></div>
                </fieldset>
                <fieldset>
                    <legend><h3>Sonderwünsche</h3></legend>
                    <div class="large-3 columns">
                        <? echo $this->Form->label('Flugzeug'); ?>
                        <? echo $this->Form->select('plane',$planes); ?>
                        <? echo $this->Form->label('Catering'); ?>
                        <? echo $this->Form->select('catering',['0' => 'Bitte wählen','1' => 'Economy','2' => 'VIP', '3' => 'Vegan']); ?>
                        <? echo $this->Form->label('zuästzliche Flugbegleiter'); ?>
                        <? echo $this->Form->select('catering',['Bitte wählen','1','2','3']); ?>
                    </div>
                    <div class="large-3 columns">

                    </div>
                    <div class="large-3 columns"></div>
                    <div class="large-3 columns"></div>
                </fieldset>

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
                <? echo $this->Form->select("country", $countries ,["default" => 0, "class" => "country"]); ?>
            </div>
            <div class="airport large-3 columns hiddenDiv">
                <? echo $this->Form->select("airport", [] ,["default" => 0]); ?>
            </div>
            <div class="large-3 columns">
                <? echo $this->Form->input('stay_duration',['label' => '','placeholder' => 'Aufenthaltsdauer']); ?>
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


        // $(this).parent().parent().append(newStation).css("visibility", "visible" );
        // alert(newStation);



        // station =  ;
    });



    $('#klassik').on('change', 'select.country', function() {

        var countryId = this.value;

// alert('countryId');

        var stationRow = $(this).parent().parent();

        if(countryId != 0){



            stationRow.find('div.hiddenDiv').css( "visibility", "visible" );

            var countries= <?php echo json_encode($countries); ?>;

            // alert(countries[countryId]);

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

                        console.log(key);
                        console.log(airport.nameD);
                        stationRow.find('div.airport select').append('<option value=' + key + '>' + airport + '</option>');
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

    $('.datetimepicker').datetimepicker({
        format: 'DD.MM.YYYY HH:mm:ss',
        // format: 'LLL',
        toolbarPlacement: 'top',
        showTodayButton: true,
        showClose: true,
        // defaultDate:
    });

</script>
