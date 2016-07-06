
		<div class="rejectReasons index large-10 medium-9 columns">
			<h3 id="asapblau">Auswertung der Kosten und Umsätze</h3>
			<hr>

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

				foreach($incomeByPlaneType as $income) {
					$sums[]= $income['summe'];
					$creats[]= $income['created'];
				}

				foreach($creats as $creat){
					$date = date_create_from_format('d.m.y, H:i', $creat);
					$dateFormated[]= date_format($date, 'Y-n-j');
				}

				// Values of each line

				for($i=0; $i<count($sums); $i++) {
					$array[] = array('c' => array( array('v'=>$dateFormated[$i]), array('v'=>$sums[$i])) );
				}

				$table['rows'] = $array;

				// convert data into JSON format
				$jsonTable = json_encode($table);


?>

<html>
<head>
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
		  chart.draw(data, options);
		}

  </script>

</head>
<body>
			<div class="row">
				<div class="large-10 columns strings view-table" id="line_chart">
				</div>
			</div>
		</div>
		<br/>
		<br>

		<div class="incomeByPlaneTypes large-10 medium-9 columns">
			<table cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('Rechnungs-ID') ?></th>
						<th><?= $this->Paginator->sort('Flugzeug-ID') ?></th>
						<th><?= $this->Paginator->sort('Flugzeugtyp') ?></th>
						<th><?= $this->Paginator->sort('Rechungswert in EUR') ?></th>
						<th><?= $this->Paginator->sort('erstellt am') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($incomeByPlaneType as $income): ?>
					<tr>
						<td><?= $income->invoice_id?></td>
						<td><?= $income->plane_typ_id ?></td>
						<td><?= $income->plane_type->type?></td>
						<td><?= $income->invoice->value?></td>
						<td><?= $income->created?></td>
					</tr>

				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="incomeByPlaneTypes large-12 medium-9 columns">
			<div class="row">
			<br />
			<br />
			<span class="primary-button" style=""><?= $this->Html->link("Zurück", ['action' => 'index']) ?></span>
			</div>
		</div>
</body>
</html>
