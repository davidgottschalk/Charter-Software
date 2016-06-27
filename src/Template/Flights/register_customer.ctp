<div class="customers view large-12 medium-9 columns">
    <br><br>
        <h2 id="asapblau">Persönliche Daten eingeben</h2>
        <hr>
        <br>

        <div class="large-4 columns">
            <?= $this->Form->create(); ?>
            <?if(isset($customerNumberError)){?>
                <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                    <div class="large-6 columns">
                        <?=$customerNumberError?>
                     </div>
                </div>
            <?}?>
            <fieldset>
                <legend><h3>Sie sind bereits Kunde?</h3></legend>
                <div>
                    <? echo $this->Form->input('customerNumber', ['label' => 'Geben Sie bitte Ihre Kundennummer ein.']); ?>
                </div>
            </fieldset>
            <?= $this->Form->button('Weiter') ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="large-8 columns">
            <?= $this->Form->create(); ?>
            <fieldset>
                <legend><h3>Sie sind noch kein Kunde?</h3></legend>
                <div>
                    <?if(isset($errors['first_name'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "Vorname" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('first_name',['label' => 'Vorname']); ?></p>
                    <?if(isset($errors['last_name'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "Vorname" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('last_name',['label' => 'Nachname']); ?></p>
                    <p><? echo $this->Form->input('company',['label' => 'Firma']); ?></p>
                    <?if(isset($errors['email'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "E-Mail" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('email',['label' => 'E-Mail']); ?></p>
                    <?if(isset($errors['street'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "Straße" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('street',['label' => 'Straße']); ?></p>
                    <?if(isset($errors['postal_code'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "Postleitzahl" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('postal_code',['label' => 'Postleitzahl']); ?></p>
                    <?if(isset($errors['country'])){?>
                        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
                            <div class="large-8 columns">
                                Das Feld "Land" wurde nicht korrekt gefüllt.
                            </div>
                        </div>
                    <?}?>
                    <p><? echo $this->Form->input('country',['label' => 'Land']); ?></p>

                </div>
            </fieldset>
            <?= $this->Form->button('Weiter') ?>
            <?= $this->Form->end() ?>
        </div>
        <hr>
        <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'abortCustomerCredentials']) ?></span>


</div>
