<?php include 'header.php';?>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class = "row">
                            <div class="container" style="text-align:center;">
                                <h1><a href="https://www.theedgemarkets.com/article/bursa-malaysia-trade-cautious-mode-next-week">Bursa Malaysia to trade cautious next week</a></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container" style="text-align:center;">
                                <p>kushfligsligsklskleksnkgsnlkjs;ljgsljsglgslgsnlsnglngslsgnll</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class = "row">
                            <div>
                                <h1></h1>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class = "row">
                            <div>
                                <h1></h1>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class = "row">
                            <div>
                                <h1></h1>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class = "row">
                            <div>
                                <h1><h1>
                            </div>
                        </div>
                    </li>
        
                    
                </ul>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://bloomberg-market-and-financial-news.p.rapidapi.com/news/list?id=markets%7Cstocks",
            "method": "GET",
            "headers": {
                "x-rapidapi-key": "291307759cmshc15ed4d71d3f4a3p11d752jsn15634952148d",
                "x-rapidapi-host": "bloomberg-market-and-financial-news.p.rapidapi.com"
            }
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
            console.log(response.modules[0]['stories']);
        });
    });
</script>
<?php include 'footer.php';?>
