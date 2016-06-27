<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ASAP';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?
    echo $this->Html->css([
        'bootstrap.min',
        'bootstrap-responsive',
        'bootstrap-datetimepicker.min',
        'font-awesome/css/font-awesome.min',
    ]);

    echo $this->Html->script([
        'libs/jquery-1.11.0.min',
        'libs/jquery-ui-1.11.0.min',
        'libs/bootstrap.min',
        'libs/moment-with-langs.min',
        'libs/bootstrap-datetimepicker.min',
    ]);
    ?>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('div.message.error').delay(4000).fadeOut('slow');
        });
    </script>
    <header>
        <?=$this->element('header') ?>
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row content-area">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <br>
        <br>
        <footer>
            <hr>
            <center>ASAP - Aviation services and project GmbH</center>
        </footer>
    </div>
</body>
</html>
