<?php 
include 'header.php';
include 'script/dbcon.php';

if(isset($_GET['company'])){
	$result = getCompanyProfile($conn,$_GET['company']);
	$company = $result->fetch_assoc();
}else{
	header('Location:stock_list.php');
}
$wallet = getUserProfile($conn,1);
$wallet = $wallet->fetch_assoc();
$silver_wallet = $wallet['silver'];  
$gold_wallet = $wallet['gold'];

$value = $_GET['company'];
?>

<style>
.floating-tooltip-2 {
	width: 130px;
	height: 250px;
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
  margin-top: 15px;
}

.modal-backdrop.show{
	opacity: 0.2;
}

input{
	font-size:17px !important;
}

</style>

<div class="content-wrapper">
	<div class="row">

		<div class="col-md-4 grid-margin">
			<div class="card">
				<div class="card-body" style="font-size: 18px;padding-bottom: 70px">
					<h4>Backward Date</h4>
					<input class="form-control" type="date" id="target_date" max="<?php echo date('Y-n-j')?>" style="width:100%;height:50px;font-size:17px">
				</div>
			</div>
		</div>

		<div class="col-md-4 grid-margin">
			<div class="card">
				<div class="card-body" style="font-size: 18px">
					<h4>Buying Price</h4>
					<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>B</i>
							</span>
						</div>
						<input type='text' class='form-control buy_price' readonly value="	" style="font-size:17px"/>
					</div>
					<button id="buy_btn" style="margin-top:10px;width:100%;height:40px" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#buy_modal">Buy</button>
				</div>
			</div>
		</div>

		<div class="col-md-4 grid-margin">
			<div class="card">
				<div class="card-body" style="font-size: 18px">
					<h4>Sell</h4>
					<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>S</i>
							</span>
						</div>
						<input type='text' class='form-control sell_price' readonly value="" style="font-size:17px"/>
					</div>
					<button id="sell_btn" style="margin-top:10px;width:100%;height:40px" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#sell_modal">Sell</button>
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
							<button style="float:right;height:50px" class="btn btn-dark btn-rounded" id="live">Back To Live</button>
						</div>
						<div class="col-md-4">
							<h5 id="dateOfGraph">Date of Graph: <?php echo date("d-M-Y"); ?></h5>
						</div>
						<div class="col-md-4">
							<h5 id="price"></h5>
						</div>
						<div class="col-md-4">
							<h5>Today Date: <?php echo date("d-M-Y"); ?></h5>
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
						<h4>Information</h4>

					</div>
				</div>
			</div>
		</div>
	</div>


<!-- Buy Modal -->
<div class="modal fade" id="buy_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buy Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
        	<h4>Date</h4>
        	<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>B</i>
							</span>
						</div>
						<input type='date' class='form-control transaction_date' readonly value="" style="font-size:17px"/>
					</div>

        	<h4 style="margin-top: 20px">Current Buying Price</h4>
        	<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>B</i>
							</span>
						</div>
						<input type='text' class='form-control buy_price' readonly value="" style="font-size:17px"/>
					</div>

					<div class="row" style="margin-top: 20px">
						<div class="col-md-6">
							<h4>Quantity Lot <small>(1 x 100)</small></h4>
							<input id="buy_lot" type="number" class="form-control" min=1>
						</div>

						<div class="col-md-6">
							<h4>Total Amount</h4>
							<div class='input-group'>
								<div class='input-group-prepend bg-info' style='border-radius:5px'>
									<span class='input-group-text bg-transparent'>
										<i style='font-size:16px;color:white'>RM</i>
									</span>
								</div>
								<input id="buy_amount" type="text" class="form-control" value="" readonly />
							</div>
						</div>

						<div class="col-md-12" style="text-align: center;margin-top: 20px">
							<h4>Current Wallet Amount</h4>
							<div class='input-group'>
								<div class='input-group-prepend bg-info' style='border-radius:5px'>
									<span class='input-group-text bg-transparent'>
										<i style='font-size:16px;color:white'>RM</i>
									</span>
								</div>
								<input type="text" wallet="" class="form-control wallet_amount" readonly>
							</div>
						</div>

						<div class="col-md-12" style="text-align: center">
							<button id="buy_stock" class="btn btn-success btn-rounded" style="margin-top:20px;width:100%;height:40px;font-size:16px">Buy</button>
						</div>
					</div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Sell Modal -->
<div class="modal fade" id="sell_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sell Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
        	<h4>Date</h4>
        	<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>B</i>
							</span>
						</div>
						<input type='date' class='form-control transaction_date' readonly value="" style="font-size:17px"/>
					</div>

        	<h4 style="margin-top: 20px">Current Selling Price</h4>
        	<div class='input-group'>
						<div class='input-group-prepend bg-info' style='border-radius:5px'>
							<span class='input-group-text bg-transparent'>
								<i style='font-size:16px;color:white'>B</i>
							</span>
						</div>
						<input type='text' class='form-control sell_price' readonly value="" style="font-size:17px"/>
					</div>

					<div class="row" style="margin-top: 20px">
						<div class="col-md-6">
							<h4>Quantity Lot <small>(1 x 100)</small></h4>
							<input id="sell_lot" type="number" class="form-control" min=1>
						</div>

						<div class="col-md-6">
							<h4>Total Amount</h4>
							<div class='input-group'>
								<div class='input-group-prepend bg-info' style='border-radius:5px'>
									<span class='input-group-text bg-transparent'>
										<i style='font-size:16px;color:white'>RM</i>
									</span>
								</div>
								<input id="sell_amount" type="text" class="form-control" value="" readonly />
							</div>
						</div>

						<div class="col-md-12" style="text-align: center;margin-top: 20px">
							<h4>Current Wallet Amount</h4>
							<div class='input-group'>
								<div class='input-group-prepend bg-info' style='border-radius:5px'>
									<span class='input-group-text bg-transparent'>
										<i style='font-size:16px;color:white'>RM</i>
									</span>
								</div>
								<input type="text" wallet="" class="form-control wallet_amount" readonly>
							</div>
						</div>

						<div class="col-md-12" style="text-align: center">
							<button id="sell_stock" class="btn btn-danger btn-rounded" style="margin-top:20px;width:100%;height:40px;font-size:16px">Sell</button>
						</div>
					</div>
					
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
			top: 0.3,
			bottom: 0.2,
		},
    visible: true,
		borderVisible: false,
		mode:1,
		},
	  rightPriceScale: {
	  	visible: true,
	    scaleMargins: {
				top: 0.4,
				bottom: 0.2,
			},
		},
		timeScale: {
			borderVisible: true,
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
var buy_price = 0,sell_price = 0;
$.get('script/generate_date.php',
	{
		'method' : 'current'
	},function(data){
		series.setData(data);
		$("#price").html("Current Price: Rm "+ data[data.length-1]['value']);
		buy_price = data[data.length-1]['value'];
		sell_price = data[data.length-1]['value'];
		buy_price = (buy_price * 100.19) / 100;
		sell_price = (sell_price * 99.99) / 100;
		$(".buy_price").val(buy_price.toFixed(4));
		$(".sell_price").val(sell_price.toFixed(4));
	},'json');

$("#target_date").change(function(){
	let date = $(this).val();
	$.get('script/generate_date.php',{
		'method' : 'backward','date':date
	},function(data){
		series.setData(data);
		$("#price").html("Current Price: Rm "+data[data.length-1]['value']);
		$("#dateOfGraph").html("Date of Graph: "+data[data.length-1]['time']['day']+"-"+months[data[data.length-1]['time']['month']]+"-"+data[data.length-1]['time']['year']);
		buy_price = data[data.length-1]['value'];
		sell_price = data[data.length-1]['value'];
		buy_price = (buy_price * 100.19) / 100;
		sell_price = (sell_price * 99.99) / 100;
		$(".buy_price").val(buy_price.toFixed(4));
		$(".sell_price").val(sell_price.toFixed(4));
	},'json');


})

$("#live").click(function(){
	$.get('script/generate_date.php',
		{
			'method' : 'current'
		},function(data){
			series.setData(data);
			$("#price").html("Current Price: Rm "+ data[data.length-1]['value']);
			buy_price = data[data.length-1]['value'];
			sell_price = data[data.length-1]['value'];
			buy_price = (buy_price * 100.19) / 100;
			sell_price = (sell_price * 99.99) / 100;
			$(".buy_price").val(buy_price.toFixed(4));
			$(".sell_price").val(sell_price.toFixed(4));
		},'json');

	$("#dateOfGraph").html("Date of Graph: <?php echo date('d-M-Y'); ?>");
	$("#target_date").val("");

})

var months = {
     '1': 'Jan',
     '2': 'Feb',
     '3': 'Mar',
     '4': 'Apr',
     '5': 'May',
     '6': 'Jun',
     '7': 'Jul',
     '8': 'Aug',
     '9': 'Sep',
     '10': 'Oct',
     '11': 'Nov',
     '12': 'Dec',
   }

$("#buy_btn").click(function(){
	if($("#target_date").val() == ""){
		$(".transaction_date").val("<?php echo date('Y-n-j'); ?>");
	}else{
		$(".transaction_date").val($("#target_date").val());
	}

	if($(".transaction_date").val() == "<?php echo date('Y-n-j'); ?>"){
		$(".wallet_amount").val("<?php echo $gold_wallet ?>");
		$(".wallet_amount").attr("wallet","gold");
	}else{
		$(".wallet_amount").val("<?php echo $silver_wallet ?>");
		$(".wallet_amount").attr("wallet","silver");
	}
});

$("#sell_btn").click(function(){
	if($("#target_date").val() == ""){
		$(".transaction_date").val("<?php echo date('Y-n-j'); ?>");
	}else{
		$(".transaction_date").val($("#target_date").val());
	}

	if($(".transaction_date").val() == "<?php echo date('Y-n-j'); ?>"){
		$(".wallet_amount").val("<?php echo $gold_wallet ?>");
	}else{
		$(".wallet_amount").val("<?php echo $silver_wallet ?>");
	}

});

$("#buy_lot").on("input",function(){
	$("#buy_amount").val(($(this).val() * 100 * $(".sell_price").val()).toFixed(4));
});

$("#sell_lot").on("input",function(){
	$("#sell_amount").val(($(this).val() * 100 * $(".sell_price").val()).toFixed(4));
});

$("#buy_stock").click(function(){
	if(parseFloat($("#buy_amount").val()) <= parseFloat($(".wallet_amount").val())){
		$.post("script/transaction.php",
		{
			'method'			: 'buy',
			'user_id'			: '1',
			'lot'					: $("#buy_lot").val(),
			'lot_price'		: $(".buy_price").val(),
			'credit_type' : $('.wallet_amount').attr('wallet'),
			'amount'			: parseFloat($("#buy_amount").val()),
			'date'				: $(".transaction_date").val(),
			'stock_id'		: <?php echo $_GET['company']; ?>
		},function(data){
			if(data){

			}else{

			}

		},'json');
	}else{
		alert("Your wallet not enough credit to continue");	
	}
});

$("#sell_stock").click(function(){
	
});

</script>
<?php include 'footer.php'?>
