<?php 
include 'header.php';
include 'script/dbcon.php';

if(isset($_GET['company'])){
	$result = getCompanyProfile($conn,$_GET['company']);
	$company = $result->fetch_assoc();
}else{
	header('Location:stock_list.php');
}

?>

<style>
.floating-tooltip-2 {
	width: 130px;
	height: 300px;
	position: absolute;
	display: none;
	padding: 8px;
	box-sizing: border-box;
	font-size: 12px;
	color: '#20262E';
	background-color: rgba(255, 255, 255, 0.23);
	text-align: left;
	z-index: 1000;
	top: 12px;
	left: 12px;
	pointer-events: none;
	border-radius: 4px 4px 0px 0px;
  border-bottom: none;
  box-shadow: 0 2px 5px 0 rgba(117, 134, 150, 0.45);
}
</style>

<div class="content-wrapper">
	<div class="row">

		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body" style="font-size: 18px">
					<h4>Backward Date</h4>
					<input class="form-control" type="date" id="target_date" style="width:300px">
				</div>
			</div>
		</div>

		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="row" style="margin-bottom: 25px">
						<div class="col-md-6" style="font-weight: 600;margin-bottom: 20px">
							<?php echo $company['stock_name']?><br/>
							KLSE: <?php echo $company['stock_symbol']?>
						</div >
						<div class="col-md-6" >
							<button style="float:right" class="btn btn-secondary btn-rounded" id="live">Back To Live</button>
						</div>
						<div class="col-md-4">
							<h5>Date of Graph: <?php echo date("d-M-Y"); ?></h5>
						</div>
						<div class="col-md-4">
							<h5 id="price"></h5>
						</div>
						<div class="col-md-4">
							<h5>Date: <?php echo date("d-M-Y"); ?></h5>
						</div>
					</div>
					<div class="chart"></div>
				</div>
			</div>
		</div>

		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12">
						<h4>Functional Panel</h4>

						<div class='input-group'>
							<div class='input-group-prepend bg-info' style='border-radius:5px'>
								<span class='input-group-text bg-transparent'>
									<i style='font-size:16px;color:white'>B</i>
								</span>
							</div>
							<input type='text' class='form-control' readonly value="" style="width:30%"/>
						</div>

					</div>
				</div>
			</div>
		</div>


	</div>

<?php include 'script.php'?>
<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>

<script>
//Chart Styling Start
var container = document.querySelector(".chart");
var width = (screen.width - 500);
var height = screen.height / 2;
const chart = LightweightCharts.createChart(document.querySelector(".chart"), 
	{ 
		width: width, height: height,
		leftPriceScale: {
		scaleMargins: {
			top: 0.4,
			bottom: 0.2,
		},
    visible: true,
		borderVisible: false,
		mode:1,
		},
	  rightPriceScale: {
	    visible: false,
		},
		timeScale: {
			borderVisible: false,
		},
		grid: {
			horzLines: {
				color: '#eee',
			},
			vertLines: {
				color: '#ffffff',
			},
		},
	  crosshair: {
	  		horzLine: {
	      	visible: false,
	        labelVisible: false
	      },
	      vertLine: {
	      	visible: true,
	        style: 0,
	        width: 2,
	        color: 'rgba(32, 38, 46, 0.1)',
	        labelVisible: false,
	      }
	  },
	  layout: {
	  	fontSize: 16,
	  },
});

var series = chart.addAreaSeries({	
	topColor: 'rgba(0, 120, 255, 0.2)',	
  bottomColor: 'rgba(0, 120, 255, 0.0)',
	lineColor: 'rgba(0, 120, 255, 1)',
	lineWidth: 3
});

function businessDayToString(businessDay) {
	return new Date(Date.UTC(businessDay.year, businessDay.month - 1, businessDay.day, 0, 0, 0)).toLocaleDateString('en-GB');
}

var toolTipWidth = 96;
var toolTipHeight = 80;
var toolTipMargin = 15;
var priceScaleWidth = 50;

var toolTip = document.createElement('div');
toolTip.className = 'floating-tooltip-2';
container.appendChild(toolTip);

// update tooltip
chart.subscribeCrosshairMove(function(param) {
	if (!param.time || param.point.x < 0 || param.point.x > width || param.point.y < 0 || param.point.y > height) {
		toolTip.style.display = 'none';
		return;
	}

	var dateStr = LightweightCharts.isBusinessDay(param.time)
		? businessDayToString(param.time)
		: new Date(param.time * 1000).toLocaleDateString('en-GB');

	toolTip.style.display = 'block';
	var price = param.seriesPrices.get(series);
	toolTip.innerHTML = '<div style="color: rgba(0, 120, 255, 0.9)">⬤ Price</div>' +
		'<div style="font-size: 24px; margin: 4px 0px; color: #20262E">' + price.toFixed(4) + '</div>' +
		'<div>' + dateStr + '</div>';

	var left = param.point.x;

  
 	if (left > width - toolTipWidth - toolTipMargin) {
		left = width - toolTipWidth;
	} else if (left < toolTipWidth / 2) {
  	left = priceScaleWidth;
  }

	toolTip.style.left = left + 'px';
	toolTip.style.top = 0 + 'px';
});
//Chart Styling End Here

//Main Function

$.get('script/generate_date.php',{'method' : 'current'},function(data){series.setData(data);$("#price").html("Current Price: Rm "+ data[data.length-1]['value'])},'json');


$("#target_date").change(function(){
	let date = $(this).val();
	$.get('script/generate_date.php',{'method' : 'backward','date':date},function(data){series.setData(data);},'json');
})

$("#live").click(function(){
	$.get('script/generate_date.php',{'method' : 'current'},function(data){series.setData(data);$("#price").html("Current Price: Rm "+ data[data.length-1]['value'])},'json');
	$("#target_date").val("");
})

</script>
<?php include 'footer.php'?>
