<?php include 'header.php';?>
<div class="content-wrapper">
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title">Calendar</h4>
            </div>
        </div>
    </div>

<div class="container">
  <div class="row">
    <div class="column-sm-6">
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/indices/" rel="noopener" target="_blank"><span class="blue-text">Indices</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
        {
        "colorTheme": "light",
        "dateRange": "1D",
        "showChart": true,
        "locale": "en",
        "largeChartUrl": "",
        "isTransparent": false,
        "showSymbolLogo": true,
        "width": "500",
        "height": "660",
        "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
        "plotLineColorFalling": "rgba(17, 85, 204, 1)",
        "gridLineColor": "rgba(111, 168, 220, 1)",
        "scaleFontColor": "rgba(120, 123, 134, 1)",
        "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
        "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
        "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
        "tabs": [
          {
            "title": "Indices",
            "symbols": [
              {
                "s": "INDEX:KLSE",
                "d": "Bursa Malaysia"
              },
              {
                "s": "INDEX:STI",
                "d": "Singapore"
              },
              {
                "s": "HSI:HSI",
                "d": "Hong Kong"
              },
              {
                "s": "INDEX:NKY",
                "d": "Nikkei 225"
              },
              {
                "s": "DJCFD:DJI",
                "d": "Dow 30"
              },
              {
                "s": "FOREXCOM:NSXUSD",
                "d": "Nasdaq 100"
              },
              {
                "s": "FOREXCOM:SPXUSD",
                "d": "S&P 500"
              }
            ],
            "originalTitle": "Indices"
          }
        ]
      }
        </script>
      </div>
      <!-- TradingView Widget END -->

    </div>

    <div class="column-sm-6">
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
        {
        "colorTheme": "light",
        "isTransparent": false,
        "width": "500",
        "height": "660",
        "locale": "en",
        "importanceFilter": "-1,0,1",
        "currencyFilter": "USD,CNY,SGD,MYR,JPY,IDR,HKD,DEM"
      }
        </script>
      </div>
      <!-- TradingView Widget END -->
    
    </div>
  </div>
</div>

</div>

<?php include 'footer.php';?>