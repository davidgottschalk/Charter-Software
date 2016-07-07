<?
	$rows = array();
	$table = array();
	$table['cols'] = array(

	// Labels the chart, these represent the column titles.

	array('label' => 'Zeitraum', 'type' => 'string'),
	array('label' => 'Umsätze in EUR', 'type' => 'number'),
	array('label' => 'Kosten in EUR', 'type' => 'number')

	);
	/* Extract the information from $incomeByPlaneType and transfer created to date */
	$revenues = [];
	$dates = [];
	$chartRows = [];

	foreach($incomeByPlaneType as $income) {
		$revenues[] = $income['summe'];
		$dates[] = explode(' ',$income['created'])[0];
	}

	// Values of each line

	for($i=0; $i<count($revenues); $i++) {
		$chartRows[] = ['c' => [ ['v'=>$dates[$i] ], ['v'=>$revenues[$i] ], ['v'=>$planeCosts[$i] ] ] ];
	}

	if(empty($chartRows)){
		$chartRows = [['c' =>[[]]]];
	}

	$table['rows'] = $chartRows;

	// convert data into JSON format
	$jsonTable = json_encode($table);
?>


<div class="rejectReasons index large-10 medium-9 columns">
	<h3 id="asapblau">Auswertung der Kosten und Umsätze</h3>
	<hr>
	<div class="row">
		<div class="large-10 columns strings view-table" id="line_chart"></div>
	</div>
</div>

<div class="incomeByPlaneTypes large-10 medium-9 columns">
	<br>

	<?if(!empty($allIncomes[0]->invoice)){?>
	<h4 id="asapblau">Die Umsätze im Detail:</h4>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Rechnungs-ID</th>
				<th>Flugzeug-ID</th>
				<th>Flugzeugtyp</th>
				<th>Rechungswert in EUR</th>
				<th>erstellt am</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($allIncomes as $income): ?>
			<tr>
				<td><?= $income->invoice->invoice_number?></td>
				<td><?= $income->plane_type->manufacturer ?></td>
				<td><?= $income->plane_type->type?></td>
				<td><?= $income->invoice->value?></td>
				<td><?= $income->created?></td>
			</tr>

		<?php endforeach; ?>
		</tbody>
	</table>
	<?}?>
</div>
<div class="incomeByPlaneTypes large-12 medium-9 columns">
	<div class="row">
	<br />
	<br />
	<span class="primary-button" style=""><?= $this->Html->link("Zurück", ['action' => 'index']) ?></span>
	</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['line']});
	google.charts.setOnLoadCallback(drawChart);

	 function drawChart() {


	  var data = new google.visualization.DataTable(<?=$jsonTable?>);

	  var options = {
		chart: {
		  title: '',
		  subtitle: ''
		},
		width: 900,
		height: 480,
		axes: {
		  x: {
			0: {side: 'bottom'}
		  },
		}
	  };

	  var chart = new google.charts.Line(document.getElementById('line_chart'));
	  if(typeof chart !== undefined){
	  	chart.draw(data, options);
	  }
	}

</script>
