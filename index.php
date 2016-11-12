<?php include_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!-- Load c3.css -->
		<link href="c3.css" rel="stylesheet" type="text/css">
<!-- Load d3.js and c3.js -->
		<script src="http://d3js.org/d3.v3.min.js"></script>
		<script src="c3.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script src="js/jquery.tablesorter.js" type="text/javascript"></script>
		<script>			
			$(document).ready(function(){
				$('input.option').attr("checked","checked");
				$('input.option').click(function() {
					var modelClass = $(this).attr('name').toLowerCase().replace(/ /g, '-');
					if ($(this).is(':checked')) {
						$('.'+modelClass).show();
						$(this).attr("checked","checked");
					} else {
						$('.'+modelClass).hide();
						$(this).removeAttr("checked");
					}
				})
				$('.check-all').click(function(){
					$('input.option').each(function () {
				        $(this).prop('checked', 'checked');
				     });
				     $('tr.result').each(function(){
					     $(this).show();
					 })
				})
				$('.check-none').click(function(){
					$('input.option').each(function () {
				        $(this).prop('checked', '');
				     });
				     $('tr.result').each(function(){
					     $(this).hide();
					 })

				})

				$(function(){
					$("table").tablesorter();
				});
			})
		</script>
		<style>
						   table {margin-top:30px;}
						table th {white-space:nowrap}
						  .caret {opacity: 0;}
	.tablesorter-headerDesc span {border-color-bottom: black; opacity:1;}
	 .tablesorter-headerAsc span {opacity:1; transform: rotate(180deg);}
	 	 .check-all, .check-none {cursor: pointer; font-size: .9em; color:#3c7bd3;}
		</style>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form class="form-horizontal">
						<fieldset>
							<legend>Models</legend>
						    <?php
								$m=0;
								while ($m < $modnum) {
									$model = mysql_result($models,$m,"model");
									?>	<div class="checkbox col-lg-3 col-sm-4">
									<label><input name="<?php echo($model); ?>" class="option" type="checkbox"/> <?php echo($model); ?></label>
								</div>
								<?php $m++; } ?>
								<div class="checkbox col-lg-3 col-sm-4">
									<span class="check-all">Check All</span> | <span class="check-none">Check None</span>
								</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
		<table class="table">
			<thead>
			<tr>
				<th>Year <span class="caret"></span></th>
				<th>Model <span class="caret"></span></th>
				<th>Body Style <span class="caret"></span></th>
				<th>Engine <span class="caret"></span></th>
				<th>Induction <span class="caret"></span></th>
				<th>Horsepower <span class="caret"></span></th>
				<th>Torque <span class="caret"></span></th>
				<th>Weight <span class="caret"></span></th>
				<th>HP/Ton <span class="caret"></span></th>
				<th>TQ/Ton <span class="caret"></span></th>
			</tr>
			</thead>
			<tbody>
    <?php
		$i=0;
		while ($i < $num) {
				$carModel = mysql_result($result,$i,"model");
				$year = mysql_result($result,$i,"year");
				$induction = mysql_result($result,$i,"induction");
				$engine_size = mysql_result($result,$i,"engine_size");
				$type = mysql_result($result,$i,"type");
				$hp = mysql_result($result,$i,"hp");
				$tq = mysql_result($result,$i,"tq");
				$weight = mysql_result($result,$i,"weight");
				echo "<tr class='result " . strtolower(str_replace(' ','-',$carModel)) . "'><td>$year</td><td>$carModel</td><td>$type</td><td>$engine_size</td><td>$induction</td><td>$hp</td><td>$tq</td><td>$weight</td><td>".round($hp/($weight/2000),1)."</td><td>".round($tq/($weight/2000),1)."</td></tr>";
			$i++;
		}
	?>		</tbody>
		</table>
				</div>
			</div>
		</div>
		

<!-- 			<div id="chart"></div>	 -->

	<script>
/*
		var chart = c3.generate({
		    bindto: '#chart',
data: {
  x: 'x',
  columns: [
    ['x',
    <?php
		$i=0;
		while ($i < $num) {					
			$model=mysql_result($result,$i,"model_id");
			$year_id=mysql_result($result,$i,"year_id");
			if ($model == 'WRX') {
				echo "$year_id,";
			}
			$i++;
		}
	?>],
    ['WRX',<?php
		$i=0;
		while ($i < $num) {					
			$model=mysql_result($result,$i,"model_id");
			$hp=mysql_result($result,$i,"hp");
			if ($model == 'WRX') {
				echo "$hp,";
			}
			$i++;
		}
	?>]
  ]
		    }
		});
*/
	</script>

</body>
</html>