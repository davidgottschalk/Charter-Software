
<style type="text/css">

    .syno{
        background: linear-gradient(70deg, #ccc, white);
        padding: 30px 10px;
    }
    .planFlight:hover{
        background: linear-gradient(70deg, white, #ccc);
        padding: 30px 10px;
    }

</style>
 <i class='fa fa-plan'></i>

<h4 class="syno">Exklusiv. Unkompliziert. Persönlich.  <i class="fa fa-plane"></i></h4>
<br>
<br>
<span class="primary-button"><?= $this->Html->link("Jetzt Flug buchen", ['controller' =>'Flights', 'action' => 'order']) ?></span>




<hr>
<div style="margin-top:300px" class="users form large-7 medium-9 columns">
    <div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>

        <fieldset>
            <legend class="asapblau">Bitte geben Sie Ihren Benutzernamen und Ihr Passwort ein.</legend>
            <?= $this->Form->input('username', ['label' => 'Benutzername']) ?>
            <?= $this->Form->input('password', ['type'=>'password','label' => 'Passwort']) ?>
        </fieldset>
    <?= $this->Form->button(__('Einloggen')); ?>
    <?= $this->Form->end() ?>
    </div>
</div>
