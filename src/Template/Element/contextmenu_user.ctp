
<? if ( isset($authUser) ) { ?>

<ul class="nav navbar-nav navbar-right bpf-user-menu">
    <li  class="btn-group">
        <a href="" data-toggle="dropdown" class="dropdown-toggle">
            <i class="fa fa-user"></i>&ensp;<?=h($authUser['first_name'].' '.$authUser['last_name'])?>&ensp;<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
            <li class="navitem">
                <?=$this->Html->link("Profil", '/Users/view/'.$authUser['id'] );?>
            </li>
            <li class="navitem">
                <?=$this->Html->link( "Passwort ändern", '/Users/passwordChange/'.$authUser['id'] );?>
            </li>
            <li class="navitem">
                <?=$this->Html->link("Logout", '/Users/logout' );?>
            </li>
        </ul>
    </li>
</ul>

<? } ?>
