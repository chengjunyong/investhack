<?php 
include 'header.php';

?>

<div class="content-wrapper">
	<div class="row">
		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<table class="table">
						<thead style="background-color: rgb(137 182 234 / 80%);">
							<tr>
								<td style="text-align: left">MARKETS</td>
								<td style="text-align: left">CHANGE</td>
								<td>TREND</td>
								<td>SELL</td>
								<td>BUY</td>
								<td></td>
							</tr>
							<tbody>
								<?php
									for($a=0;$a<3;$a++){
										$result = getStockList($conn);
										while($row = $result->fetch_array()){
											$measure = rand(1,2) == 1 ? 'fa fa-caret-down' : 'fa fa-caret-up';
											echo "<tr>";
											echo "<td style='width:40%;'><img src='".$row['img_path']."' style='width:130px;height:65px;border-radius:0;' /><label style='font-size:16px'>&emsp;".$row['stock_name']."</label></td>";
											echo "<td style='color:red;font-size:22px;'><label>".round(rand(1,8)/1.413,2)."</label><br/><small><i class='$measure'></i>(".round(rand(1,10)/1.12,2)."%)</small></td>";
											echo "<td><canvas class='canvas' style='display: block;width:130px;height:65px'></canvas></td>";
											echo "<td>
															<div class='input-group'>
																<div class='input-group-prepend bg-info' style='border-radius:5px'>
																	<span class='input-group-text bg-transparent'>
																		<i style='font-size:16px;color:white'>B</i>
																	</span>
																</div>
																<input style='font-size:16px' type='text' class='form-control' readonly value=".round(rand(10,60)/1.413,2)." />
															</div>
														</td>";
											echo "<td>
															<div class='input-group'>
																<div class='input-group-prepend bg-info' style='border-radius:5px'>
																	<span class='input-group-text bg-transparent'>
																		<i style='font-size:16px;color:white'>S</i>
																	</span>
																</div>
																<input style='font-size:16px' type='text' class='form-control' readonly value=".round(rand(10,60)/1.413,2).">
															</div>
														</td>";
											echo "<td><a href='c_dashboard.php?company=".$row['id']."'><button class='btn btn-primary btn-fw btn-rounded' style='font-size:17px'>Check</button></a></td>";
											echo "</tr>";
										}
									}
								?>
							</tbody>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>



<?php include 'footer.php'; ?>

<script>
var target = document.getElementsByClassName("canvas");

for(let a of target){
	createGraph(a);
}

function createGraph(target){

	var canvas = target,
			context = canvas.getContext('2d'),
			width = canvas.width = 130,
			height = canvas.height = 65;

	var stats = [];

	for(let a=0;a<14;a++){
		stats.push(Math.floor((Math.random() * 50) + 1));
	}		

	context.translate(1, height);
	context.scale(1, -1);

	context.fillStyle = 'white';
	context.fillRect(0, 0, width, height);

	var left = 0,
			prev_stat = stats[0],
			move_left_by = 10;

	for(stat in stats) {
		the_stat = stats[stat];

		context.beginPath();
		context.moveTo(left, prev_stat);
		context.lineTo(left+move_left_by, the_stat);
		context.lineWidth = 2;
		context.lineCap = 'round';
		context.strokeStyle = "#d89e3d";

		context.stroke();

		prev_stat = the_stat;
		left += move_left_by;
	}
}
</script>