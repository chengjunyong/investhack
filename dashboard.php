<?php include 'header.php'?>

<style>
.frame{
	margin:15px 30px 0px 15px;
}
.header{
	background-color: gray;
}

html,body {
	font-family: 'Trebuchet MS', Roboto, Ubuntu, sans-serif;
	background: #f9fafb;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.floating-tooltip-2 {
	width: 96px;
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

<div class="header"></div>
<div class="frame">
	<div class="title"><h5 style="margin-bottom: 20px">Price-<?php echo date("Y-m-d") ?></h5></div>
	<div class="row">
		<div class="col-xl-7">
			<div class="chart"></div>
		</div>
		<div class="col-xl-5" style="width:100%;">
			<div class="card">
				<h4 style="margin:5 5 5 5">Function Area</h4>
				<div class="card-body">
					<input type="date" id="target_date">
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
var width = (screen.width / 12) * 5.5;
var height = screen.height - 250;
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
		'<div style="font-size: 24px; margin: 4px 0px; color: #20262E">' + (Math.round(price * 100) / 100).toFixed(2) + '</div>' +
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
$.get('script/generate_date.php',{'method' : 'current'},function(data){series.setData(data);},'json');

$("#target_date").change(function(){
	let date = $(this).val();
	$.get('script/generate_date.php',{'method' : 'backward','date':date},function(data){series.setData(data);},'json');
})

</script>
<?php include 'footer.php'?>
