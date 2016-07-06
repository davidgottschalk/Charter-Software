<div class="customers view large-12 medium-9 columns">
	<h3 id="asapblau">Kundenzufriedenheitsanalyse</h3>
	<hr>


	<?php
		$answer1=0;
		$answer2=0;
		$answer3=0;
		$answer4=0;
		$answer5=0;
		$satisfactioncount=0;
	?>

    <?php foreach ($satisfactions as $satisfaction): ?>
	<?php
		$answer1= $answer1 + $satisfaction['answer1'];
		$answer2= $answer2 + $satisfaction['answer2'];
		$answer3= $answer3 + $satisfaction['answer3'];
		$answer4= $answer4 + $satisfaction['answer4'];
		$answer5= $answer5 + $satisfaction['answer5'];
		$satisfactioncount+=1
	?>
    <?php endforeach; ?>
	<?php
		if($satisfactioncount>0){
			$average1= $answer1/$satisfactioncount;
			$average2= $answer2/$satisfactioncount;
			$average3= $answer3/$satisfactioncount;
			$average4= $answer4/$satisfactioncount;
			$average5= $answer5/$satisfactioncount;
			} else {
				echo "Für den gewählten Zeitraum wurden keine Bewertungen abgegeben. ";
			}

	?>


	<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['', ''],
          ["Wie hat Ihnen unser Flugzeug gefallen?", <?php echo $average1;?>],
          ["Wie zufrieden waren Sie mit dem Service?", <?php echo $average2;?>],
          ["Wie hat Ihnen das Bordmenü geschmeckt?", <?php echo $average3;?>],
          ["Wie beurteilen Sie unser Preis-/Leistungsverhältnis?", <?php echo $average4;?>],
          ['Welche Gesamtnote geben Sie dem Flug?', <?php echo $average5;?>]
        ]);



        var options = {
          // title: 'Kundenzufriedenheitsanalyse',
          width: 900,
          legend: { position: 'none' },
          chart: { title: '' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: '', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('barchart'));
        chart.draw(data, options);
      };
	</script>
	</head>

			<div class="customers view large-9 medium-6 columns">
				<div id="barchart" style="width: 900px; height: 500px;"></div>
			</div>

			<?php if ($satisfactioncount>0){

				echo '<fieldset>';
				echo '<legend>Anzahl der Bewertungen</legend>';
				echo '<p id="center"><strong><style> #center { text-align: center;  color: rgba(6, 0, 98, 1); font-size: x-large;}</style>'.$satisfactioncount.'</strong></p>';
				echo '</fieldset>';
				}
			?>
		</div>
		<br>

		<?php if ($satisfactioncount>0){
			echo'<div class="row">';
				echo '<div class="customers view large-10 medium-9 columns">';
					echo '<span class="primary-button" style="">'.$this->Html->link('Zurück', ['controller' => 'Reportings', 'action' => 'index', '_full' => true]).'</span>';
				echo '</div>';
			echo '</div>';
			}
			else{
				echo'';
			}
		?>

