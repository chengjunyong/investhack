<?php include 'header.php';
include 'script/dbcon.php'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-8 col-sm-7">
            <div class="card shadow mb-4" style="height:350px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">News Feed</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php  
                        $guruid = $_GET["id"];
                        $result1 = getGuruById($conn,$guruid);
                        $guru = $result1->fetch_assoc();
                        $i = 0;
                        $result = getPostById($conn,$guruid);
                        while($row = $result->fetch_array()){
                            if ($i>2){
                            break;
                            }

                            ?>
                    <div class="d-flex row">
                        <div>
                            <div class="d-flex flex-column comment-section">
                                <div class="bg-white p-2" >
                                    <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                            src="<?php echo $guru["image"];?>" width="40">
                                        <div class="d-flex flex-column justify-content-start ml-2"><span
                                                class="d-block font-weight-bold name"><?php echo $guru["name"];?></span><span
                                                class="date text-black-50">Shared publicly -
                                                <?php echo $row["date"];?></span></div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text"><?php echo $row["content"];?></p>
                                    </div>
                                </div>
                                <!-- <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span
                                                class="ml-1">Like</span></div>
                                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span
                                                class="ml-1">Dislike</span></div>
                                    </div>
                                </div> -->

                            </div>
                        </div>

                    </div>
                    <?php 
                        $i++ ;
                    }

                    ?>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-4 col-sm-5">
            <div class="card shadow mb-4" style="height:350px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 col-md-4">
                            <img src="<?php echo $guru["image"];?>" style="width:100%;" alt=""
                                class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-4 col-md-8">
                            <blockquote>
                                <p><?php echo $guru["name"]; ;?></p> <small><cite title="Source Title">Gotham, United
                                        Kingdom <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                            </blockquote>
                            <p> <i class="glyphicon glyphicon-envelope"></i> masterwayne@batman.com
                                <br /> <i class="glyphicon glyphicon-globe"></i> www.bootsnipp.com
                                <br /> <i class="glyphicon glyphicon-gift"></i> January 30, 1974
                            </p>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="text-center">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div> -->
                    <div class="row" style="margin-top:30px;" >
                        <!-- <div class="col-md-9">

                        </div> -->
                        <div calss="col-md-3" >
                            <a href="channel.php?id=<?php echo $guruid;?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Channel</a>
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                onclick='subscribeMentor(<?php echo $guruid;?>,1)' value="Subscribe">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Portfolio</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped custab">
                        <thead>
                            <tr>
                                <th>Stock</th>
                                <th>Invested</th>
                                <th>Target Price</th>
                                <th>Lot</th>
                                <th>P/L</th>
                                <th>Value</th>
                            </tr>
                        </thead>

                        <?php  
                        $i = 0;
                        $result = getStockById($conn,$guruid);
                        while($row = $result->fetch_array()){
                            if ($i>6){
                            break;
                            }

                            ?>
                        <tr>
                            <td>
                                <div class="d-flex flex-row user-info">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                            class="d-block  name"><?php echo $row["stock_name"];?></span><span
                                            class="d-block text-black-50"><?php echo $row["stock_code"];?></span></div>
                                </div>
                            </td>
                            <td>
                                <?php echo $row["invested"];?>
                            </td>
                            <td><?php echo $row["target_price"];?></td>
                            <td>
                                <div class="d-flex flex-column justify-content-start ml-2"><span
                                        class="d-block  name"><?php echo $row["lot"];?></span><span
                                        class="d-block text-black-50"><?php echo $row["lot"]."000";?>
                                        unit</span></div>
                            </td>

                            <td>
                                <div class="d-flex flex-column justify-content-start ml-2"><span
                                        class="d-block  name"><?php echo $row["profitlose_value"];?></span><span
                                        class="d-block text-black-50"><?php echo $row["profitloss"];?>%</span></div>
                            </td>
                            <td>
                                RM<?php echo $row["value"];?>
                            </td>
                        </tr>

                        <?php $i++;} ?>
                    </table>

                </div>
            </div>
        </div>

    </div>


</div>
</div>

</div>
<script>
function subscribeMentor(guruid, userid) {
    if (confirm("Do you want to subscribe this mentor? You'll need to pay monthly ")) {


        event.preventDefault();
        //use this technique for ajax data if not using RESTFul
        //NOTE: this will capture name attribute in not id in html form
        // //*
        var userid = $(this).find("#userid").val();
        var guruid = $(this).find("#guruid").val();
        $.ajax({
            type: "post",
            url: 'script/subscribe_mentor.php',
            data: {
                userid: userid,
                guruid: guruid
            },
            success: function(data) {
                location.reload();

            },
            error: function(data) {
                console.log("error");
            }
        });
        //*/
    } else {

    }

}
</script>
<?php include 'footer.php';?>