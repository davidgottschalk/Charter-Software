<div class="customers index large-12 medium-9 columns">
    <h3>Heute</h3>
    <hr>
    <span class="actions primary"><?= $this->Html->link(__('Termin hinzufügen'), ['action' => 'order']) ?></span>
    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th><?='Flugnummer'?></th>
                <th><?='Kundennummer'?></th>
                <th><?='Flugzeug'?></th>
                <th><?='Start'?></th>
                <th><?='Ende'?></th>
                <th><?='Status'?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($todayFlights as $flight): ?>
            <tr>
                <td><?= h($flight->flight_number) ?></td>
                <td>
                    <?= $flight->has('customer') ? $this->Html->link($flight->customer->customer_number, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?>
                </td>
                <td>
                    <?= $flight->has('plane') ? $this->Html->link($flight->plane->plane_name, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?>
                </td>
                <td><?= h($flight->start_date) ?></td>
                <td><?= h($flight->end_date) ?></td>
                <td><?= $flightStatus[$flight->status] ?></td>
                <td>
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $flight->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $flight->id]) ?></span>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

<br>
<br>

    <hr>

    <h3>Alle Termine</h3>
    <br>

    <?= $this->Form->create(); ?>
    <div class="large-3 columns">
        <? echo $this->Form->input('startDate',['class' => 'datetimepicker', 'label' => 'Von']); ?>
    </div>
    <div class="large-3 columns">
        <? echo $this->Form->input('endDate',['class' => 'datetimepicker', 'label' => 'Bis']); ?>
    </div>
    <?=$this->Form->button(__('Suchen'),['style'=>'height:38px; padding:10px 10px 10px 10px; margin-top:20px']) ?>

    <?if(isset($inputErrors)){?>
        <div class="row" style="background-color:#f2dede; padding:5px; margin:10px 0px;">
            <div class="large-10 columns">
                <?=$inputErrors?>
             </div>
        </div>
    <?}?>

<br>

    <table id="charter-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th><?= $this->Paginator->sort('flight_number','Flugnummer') ?></th>
                <th><?= $this->Paginator->sort('customer_number','Kundennummer') ?></th>
                <th><?= $this->Paginator->sort('plane_id','Flugzeug') ?></th>
                <th><?= $this->Paginator->sort('start_date','Start') ?></th>
                <th><?= $this->Paginator->sort('end_date','Ende') ?></th>
                <th><?= $this->Paginator->sort('status','Status') ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($flights as $flight): ?>
            <tr>
                <td><?= h($flight->flight_number) ?></td>
                <td>
                    <?= $flight->has('customer') ? $this->Html->link($flight->customer->customer_number, ['controller' => 'Customers', 'action' => 'view', $flight->customer->id]) : '' ?>
                </td>
                <td>
                    <?= $flight->has('plane') ? $this->Html->link($flight->plane->plane_name, ['controller' => 'Planes', 'action' => 'view', $flight->plane->id]) : '' ?>
                </td>
                <td><?= h($flight->start_date) ?></td>
                <td><?= h($flight->end_date) ?></td>
                <td><?= $flightStatus[$flight->status] ?></td>
                <td>
                    <span class="actions secondary"><?= $this->Html->link(__('Anzeigen'), ['action' => 'view', $flight->id]) ?></span>
                    <span class="actions secondary"><?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $flight->id]) ?></span>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . 'zurück') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('weiter' . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter("Seite {{page}} von {{pages}} ") ?></p>
    </div>

</div>

<script type="text/javascript">
    var date = new Date();
    $('.datetimepicker').datetimepicker({
        format: 'DD.MM.YYYY HH:mm:ss',
        // startDate : '+0d',
        showClose: true,
        // startDate: '+0d'
    });

</script>
