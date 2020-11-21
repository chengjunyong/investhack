<?php include 'header.php';
include 'script/dbcon.php'; 
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <!-- Code Here -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Recommended Mentor</h1>

                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="row">
                        <?php
                        $i = 0;
                        $result = getMentor($conn);
                        while($row = $result->fetch_array()){
                            if ($i>3){
                            break;
                            }

                            ?>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             <?php echo $row["name"];?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Monthly ROI <?php echo $row["roi"];?> %</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="<?php echo $row["image"];?>"
                                                alt="Avatar" style="width:50px;">
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="profile.php?id=<?php  echo $row["id"]; ?>">Mentor Details</a>
                                    <div class="small text-black"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                                            </path>
                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                        } 
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <!-- Code Here -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Popular Opinion from Mentor</h1>

                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- Card Body -->
                            <div class="card-body">
                            <?php
                        $i = 0;
                        $result = getOpinion($conn);
                        while($row = $result->fetch_array()){
                            if ($i>4){
                            break;
                            }
                            $result1 = getGuruById($conn,$row["guruid"]);
                            $guru = $result1->fetch_assoc();

                            ?>
                                <div class="d-flex row">
                                    <div>
                                        <div class="d-flex flex-column comment-section">
                                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info"><img class=""
                                                        src="<?php echo $guru["image"];?>" width="40">
                                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                                            class="d-block font-weight-bold name"><?php echo $guru["name"];?>
                                                            </span><span class="date text-black-50">Shared
                                                            publicly - <?php echo $row["date"];?></span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"><?php echo $row["content"];?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <?php 
                                $i++;
                            } 
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

</div>

<?php include 'footer.php';?>