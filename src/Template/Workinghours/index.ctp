<div class="workingshours index large-10 medium-9 columns">
    <h3>Arbeitszeitübersicht</h3>
	 
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
			<th><?= $this->Paginator->sort('first_name', __('Flugnummer')) ?></th>
			<th><?= $this->Paginator->sort('last_name', __('Flugzeugkennung')) ?></th>
			<th><?= $this->Paginator->sort('start_date', __('Abflug')) ?></th>
			<th><?= $this->Paginator->sort('end_date', __('Ankunft')) ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($flights as $flight): ?>
        <tr>
            <td><?= h($flight->flight_number) ?></td>
            <td><?= h($flight->plane_id) ?></td>
            <td><?= h($flight->start_date) ?></td>
			<td><?= h($flight->end_date) ?></td>
        </tr>

	
		
    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
