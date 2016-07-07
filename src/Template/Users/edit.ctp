<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Mitarbeiter bearbeiten'); if($user->status == USER_DISMISS){echo ' (Entlassen)';} ?></legend>
        <div class="large-4 columns strings edit-table">
            <h6 class="subheader"><? echo $this->Form->input('first_name',['label'=>'Vorname']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('last_name',['label'=>'Nachname']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('username',['label'=>'Benutzername']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('email',['label' => 'E-Mail']); ?></h6>
        </div>

        <div class="large-4 columns strings edit-table">
            <h6 class="subheader"><? echo $this->Form->input('street',['label'=>'Straße']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('postal_code',['label'=>'Postleitzahl']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('country',['label'=>'Land']); ?></h6>
        </div>

        <div class="large-4 columns strings edit-table">
            <h6 class="subheader"><? echo $this->Form->input('payment',['label'=>'Gehalt']); ?></h6>
            <h6 class="subheader"><? echo $this->Form->input('group_id',['label'=>'Position']); ?></h6>
        </div>

        <div class="large-4 columns strings edit-table">
        </div>

    </fieldset>

    <?= $this->Form->button (__('Speichern')) ?>
    <span class="secondary-button" style=""><?= $this->Html->link("Abbrechen", ['action' => 'index']) ?></span>

    <?if($user->status != USER_DISMISS){?>
        <?if($user->status != USER_PASSWORD_CHANGE){?>
            <span class="secondary-button" style=""><?= $this->Html->link("Passwort zurücksetzen", ['action' => 'resetPassword',$user->id]) ?></span>
        <?}?>
        <span class="secondary-button" style=""><?= $this->Html->link("Entlassen", ['action' => 'dismiss',$user->id]) ?></span>
    <?}else{?>
        <span class="secondary-button" style=""><?= $this->Html->link("Wieder einstellen", ['action' => 'reemploy',$user->id]) ?></span>
    <?}?>
    <?= $this->Form->end() ?>



</div>
