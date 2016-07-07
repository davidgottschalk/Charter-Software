<div class="users form">
<?= $this->Form->create('Users' , ['type' => 'put']) ?>
    <fieldset>
        <legend>Bitte geben Sie Ihren altes Password und Ihr neues Passwort ein.</legend>
        <?= $this->Form->input('password_old', ['type'=>'password','label' => 'Altes Passwort']) ?>
        <?= $this->Form->input('password', ['label' => 'Neues Password']) ?>
        <?= $this->Form->input('password_confirm', ['type'=>'password','label' => 'Neues Password wiederholen']) ?>
    </fieldset>
<?= $this->Form->button(__('Ändern')); ?>
<span class="secondary-button" style="margin-left:10px;"><?= $this->Html->link("Abbrechen", ['action' => 'login']) ?></span>
<?= $this->Form->end() ?>
</div>
