
<?php
	$date = date("d.m.Y");

?>

<script>
    $(function(){
       $("#Reporting").submit(function(e){
           var page = $(this).find("input[name=auswertung]:checked").attr("page");
           this.action = page;
       });
    });
</script>
<script type="text/javascript">
    function toggle_form_element() {
      if (document.getElementsByName('auswertung')[0].checked) {
        document.getElementById('display').style.display = 'block';
      } else {
        document.getElementById('display').style.display = 'none';
      }
    }



</script>

		<div id="container" onload="toggle_form_element()">
            <div id="content">
                <div class="row">
                    <div class="customers index large-12 medium-9 columns">

						<form class="form" method="post" name="Reporting" id="Reporting">
	                        <fieldset>
	                            <legend><h3>Welche Auswertung möchten Sie durchführen?</h3></legend>
	                            <div class="large-10 columns strings view-table">
									<input value="costreporting" type="radio" name="auswertung" page="<?=$this->Url->build(["action"=>"costreporting"]);?>" onclick="toggle_form_element()" checked="checked">Kosten- und Umsatzanalyse</input><br />
	                                <input value="rejectionreport" id="rejectionreport" type="radio" name="auswertung" page="<?=$this->Url->build(["action"=>"rejectionreport"]);?>" onclick="toggle_form_element()">Ablehnungsgründe für Flüge</input><br />
	                                <input value="customersatisfaction" type="radio" name="auswertung" page="<?=$this->Url->build(["action"=>"customersatisfaction"]);?>" onclick="toggle_form_element()">Kundenzufriedenheitsanalyse</input><br />

	                            </div>
	                        </fieldset>

    						<div id="display">
    	                        <fieldset>
    	                            <legend><h3>Für welches Flugzeug möchten Sie die Auswertung durchführen?</h3></legend>
    	                            <div class="large-4 columns strings view-table">
    	                                <select name="flugzeugauswahl"><option value="allplanes" selected="selected">Alle Flugzeugtypen</input><br />

    	                                <?php
    	                                	foreach ($planetypes as $ptype) {
    	                                		$index = 1;

    	                                		echo "<option value='" .$ptype['id']. "'>" .$ptype['manufacturer']. " " .$ptype['type']. "</option><br />";

    	                                		$index++;
    	                                	}?>
    									</select>
    	                           </div>
    	                        </fieldset>
    						</div>

	                        <fieldset>
	                            <legend><h3>Zeitraumauswahl</h3></legend>
	                            <div class="large-10 columns strings view-table">
                                    <span style="float:left; margin-right:50px"><? echo $this->Form->input('beginn',['class' => 'datetimepicker', 'label' => 'Beginn']); ?></span>
                                    <span style="float:left"><? echo $this->Form->input('ende',['class' => 'datetimepicker', 'label' => 'Ende']); ?></span>
	                            </div>
	                        </fieldset>


                        <div class="large-3 columns">

                        </div>


    	                <?= $this->Form->button('Auswerten') ?>
                        <?= $this->Form->end() ?>

	                	</form>
                    </div>
                </div>
            </div>
		</div>


<script type="text/javascript">



    var date = new Date();
    $('.datetimepicker').datetimepicker({
        format: 'DD.MM.YYYY',
        // startDate : '+0d',
        showClose: true,
        locale: 'de',
        // startDate: '+0d'
    });

</script>


