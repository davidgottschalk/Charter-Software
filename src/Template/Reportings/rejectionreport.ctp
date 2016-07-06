<?php

		/* get and convert data from index */

		$flugzeug = $this->request->data('flugzeugwahl');

		$startdate = $this->request->data('beginn');
		$von = (new \DateTime($startdate))->format('Y-m-d H:i:s');

		$enddate = $this->request->data('ende');
		$bis = (new \DateTime($enddate))->format('Y-m-d H:i:s');


		/* select all reason_ids, created from table reject_reasons */

		$zeitraum = $data3->select([
				'reason_id',
				'created'
				])
				->where(['created >' => $von, 'created <' => $bis]);


		$query = $data->select([
				'reason_id',
				'created',
				'anzahl' => $data->func()->count('*')])
				->where(['created >' => $von, 'created <' => $bis])
				->group('reason_id');



		// Execute the query and return the array

	try {

		$rows = array();
		$table = array();
		$table['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /*
            note that one column is in "string" format and another one is in "number" format
            as pie chart only required "numbers" for calculating percentage
            and string will be used for Slice title
        */

        array('label' => 'Grund', 'type' => 'string'),
		array('label' => 'Erstellt', 'type' => 'string'),
        array('label' => 'anzahl', 'type' => 'number')

		);
        /* Extract the information from $result */
        foreach ($query as $row) {
			switch ($row['reason_id']) {
				case 1:
					$row['reason_id'] = (String) 'Konditionen ungenügend';
					break;
				case 2:
					$row['reason_id'] = (String) 'Preis zu hoch';
					break;
				case 3:
					$row['reason_id'] = (String) 'Ich habe es mir anders überlegt';
					break;
				case 4:
					$row['reason_id'] = (String) 'etwas anderes';
					break;

			}

		  $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $row['reason_id']);

          // Values of each slice

          $temp[] = array('v' => (int) $row['anzahl']);
          $rows[] = array('c' => $temp);

		}

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

?>

<html>
    <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
		google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
		google.setOnLoadCallback(drawChart);

    function drawChart() {


          var data = new google.visualization.DataTable(<?=$jsonTable?>);

          var options = {
              is3D: 'true',
              width: 800,
              height: 440,
			  legend: {position: 'right'},
			  colors:['#00008B','#87CEFA', '#FF7F24', '#8B4513']
            };

          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, options);

        }
        </script>
      </head>

      <body>
		  <div class="rejectReasons index large-10 medium-9 columns">
			<h3 id="asapblau">Auswertung der Ablehnungsgründe von Flügen</h3>
				<div class="row">
					<div class="large-8 columns strings view-table" id="chart_div">
					</div>
					<div class="large-4 columns strings view-table">
						<fieldset>
							<legend class="asapblau">Anzahl aller Ablehnungen</legend>
						<br />
						<div class="row">
							<div class="large-2 columns strings">
								<h4><?= print_r($zeitraum->count(), true); ?></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<br />
					<span class="primary-button" style=""><?= $this->Html->link('Zurück', ['controller' => 'Reportings', 'action' => 'index']); ?></span>
				</div>
		</div>
		</div>
      </body>
</html>

