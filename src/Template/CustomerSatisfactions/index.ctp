<div class="customers view large-12 medium-9 columns">

<br>
    <h2 id="asapblau">Kundenzufriedenheitsumfrage</h2>
    <hr>
    <p>Vielen Dank das Sie sich die Zeit nehmen an unserer Kundernzufriedenheitsanalyse teilzunehmen.</p>
    <p>Bitte beantworten Sie die nachfolgenden Fragen mit einer Note von eins bis zehn. Eine 1 bedeutet dabei sehr schlecht, eine 10 bedeutet ausgezeichnet.</p>
    <br>

    <?= $this->Form->create(); ?>

    <div class="container">
    <style>.glyphicon { margin-right:5px; }</style>
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-hand-right"></span><strong>Wie hat Ihnen unser Flugzeug gefallen?</strong></span>
                    </h3>
                </div>
                    <div class="btn-group btn-group-justified" data-toggle="buttons">

                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="1">1
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="2">2
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="3">3
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="4">4
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="5">5
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="6">6
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="7">7
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="8">8
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer1" value="9">9
                      </label>
                       <label class="btn btn-default">
                        <input type="radio" name="answer1" value="10">10
                      </label>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-hand-right"></span><strong>Wie zufrieden waren Sie mit dem Service?</strong></span>
                    </h3>
                </div>

                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service1" value="1">1
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service2" value="2">2
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service3" value="3">3
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service4" value="4">4
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service5" value="5">5
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service6" value="6">6
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service7" value="7">7
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service8" value="8">8
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service9" value="9">9
                      </label>
                       <label class="btn btn-default">
                        <input type="radio" name="answer2" id="Service10" value="10">10
                      </label>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-hand-right"></span><strong>Wie hat Ihnen das Bordmenü geschmeckt?</strong></span>
                    </h3>
                </div>

                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu1" value="1">1
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu2" value="2">2
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu3" value="3">3
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu4" value="4">4
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu5" value="5">5
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu6" value="6">6
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu7" value="7">7
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu8" value="8">8
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu9" value="9">9
                      </label>
                       <label class="btn btn-default">
                        <input type="radio" name="answer3" id="Menu10" value="10">10
                      </label>
                    </div>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-hand-right"></span><strong>Wie beurteilen Sie unser Preis-/Leistungsverhältnis?</strong></span>
                    </h3>
                </div>

                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis1" value="1">1
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis2" value="2">2
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis3" value="3">3
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis4" value="4">4
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis5" value="5">5
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis6" value="6">6
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis7" value="7">7
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis8" value="8">8
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis9" value="9">9
                      </label>
                       <label class="btn btn-default">
                        <input type="radio" name="answer4" id="Preis10" value="10">10
                      </label>
                    </div>

                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-hand-right"></span><strong>Welche Gesamtnote geben Sie dem Flug?</strong></span>
                    </h3>
                </div>

                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug1" value="1">1
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug2" value="2">2
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug3" value="3">3
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug4" value="4">4
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug5" value="5">5
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug6" value="6">6
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug7" value="7">7
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug8" value="8">8
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug9" value="9">9
                      </label>
                       <label class="btn btn-default">
                        <input type="radio" name="answer5" id="flug10" value="10">10
                      </label>
                    </div>

            </div>
        </div>
    </div>
    <div>



    <br>


    <?= $this->Form->button (__('Absenden'))?>
    <span class="actions secondary" style=""></span>
    <?= $this->Form->end() ?>

</div>
