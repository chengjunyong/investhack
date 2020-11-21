<?php
include 'header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Education Channel</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php  
                        $i = 0;
                        $guruid = $_GET["id"];
                        $result = getEducationById($conn,$guruid);
                        while($row = $result->fetch_array()){
                            if ($i>6){
                            break;
                            }
                            ?>
                <div class="d-flex row showModal" data-toggle="modal" style="cursor:pointer;"
                    data-target="#exampleModal" data-date="<?php echo $row["date"];?>"
                    data-content="<?php echo $row["content"];?>" data-title="<?php echo $row["title"];?>">
                    <div>
                        <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-column mt-2"><span class="d-block font-weight-bold name">
                                        <?php echo $row["title"];?></span></div>
                                <div class="mt-2">
                                    <p class="comment-text">Posted on <?php echo $row["date"];?>.</p>
                                </div>
                            </div>
                            <!-- <div class="bg-white">
                                <div class="d-flex flex-row fs-12">
                                    <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span
                                            class="ml-1">Read</span></div>
                                    <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span
                                            class="ml-1">Save</span></div>
                                </div>
                            </div> -->

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
    <div class="col-md-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Forum</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php   $result4 = getUserById($conn,$guruid);
                        $currentUser = $result4->fetch_assoc();
                        $result1 = getGuruById($conn,$guruid);
                        $guru = $result1->fetch_assoc();
                        $i = 0;
                        $result = getForumTopicById($conn,$guruid);
                        while($row = $result->fetch_array()){
                            if ($i>2){
                            break;
                            }
                            ?>
                <div class="d-flex row">
                    <div class="col-md-12">
                        <div class="d-flex flex-column comment-section">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info"><img class="" src="<?php echo $guru["image"];?>"
                                        width="40">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                            class="d-block font-weight-bold name"><?php echo $guru["name"];?></span><span
                                            class="date text-black-50">Posted on <?php echo $row["date"];?></span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text"><?php echo $row["content"];?></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $result2 = getForumCommentById($conn,$row["id"]);
                        while($commentRow = $result2->fetch_array()){
                            if ($commentRow["type"] == 0){
                        $result3 = getUserById($conn,$commentRow["userid"]);
                        $user = $result3->fetch_assoc();

                        ?>
                        <div class="d-flex flex-column comment-section" style="margin-left:50px;">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info"><img class="" src="<?php echo $user["image"];?>"
                                        width="40">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                            class="d-block font-weight-bold name"><?php echo $user["name"];?></span><span
                                            class="date text-black-50">Posted on
                                            <?php echo $commentRow["date"];?></span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text"><?php echo $commentRow["content"];?></p>
                                </div>
                            </div>
                        </div>
                        <?php  }
                            else { ?>

                        <div class="d-flex flex-column comment-section" style="margin-left:50px;">
                            <div class="bg-white p-2">
                                <div class="d-flex flex-row user-info"><img class="" src="<?php echo $guru["image"];?>"
                                        width="40">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span
                                            class="d-block font-weight-bold name"><?php echo $guru["name"];?></span><span
                                            class="date text-black-50">Posted on
                                            <?php echo $commentRow["date"];?></span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text"><?php echo $commentRow["content"];?></p>
                                </div>
                            </div>
                        </div>


                        <?php 
                            }
                        }?>
                        <form id="commentForm" class="commentForm" name="commentForm" method="post">
                            <div class="bg-light p-2" style="margin-left:50px;">
                                <div class="d-flex flex-row align-items-start"><img class=""
                                        src="<?php echo $currentUser["image"]; ?>" width="40">
                                    <input type="hidden" class="topicid" value="<?php echo $row["id"];?>" />
                                    <input type="hidden" class="userid" value="<?php echo $currentUser["id"];?>" />
                                    <textarea class="form-control ml-1 shadow-none textarea txtArea" id="txtArea" name="txtArea"></textarea>
                                </div>
                                <div class="mt-2 text-right"><input class="btn btn-primary btn-sm shadow-none"
                                        type="submit" value="Post Comment"></input></div>
                            </div>
                        </form>
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
<script>
$(function() {


    $(".commentForm").submit(function(event) {

        event.preventDefault();
        //use this technique for ajax data if not using RESTFul
        //NOTE: this will capture name attribute in not id in html form
        // //*
        var txt = $(this).find(".txtArea").val();
        var topicid = $(this).find(".topicid").val(); 
        var userid = $(this).find(".userid").val(); 
        var commentForm = $(this).serialize();

        var comment = new Object();
        comment.content = txt;
        comment.type = 0;
        comment.topicid = topicid;
        comment.userid = userid;
        $.ajax({
            type: "post",
            url: 'script/post_comment.php',
            data:{
                content: comment.content,
                type: comment.type,
                topicid:comment.topicid,
                userid: comment.userid
            },
            success: function(data) {
                location.reload();

            },
            error: function(data) {
                console.log("error");
            }
        });
        //*/

    });

});
$(document).on("click", ".showModal", function() {
    //  var myBookId = $(this).data('id');
    //  $(".modal-body #bookId").val( myBookId );
    // var button = $(event.relatedTarget) // Button that triggered the modal
    var date = $(this).data('date') // Extract info from data-* attributes
    var content = $(this).data('content') // Extract info from data-* attributes
    var title = $(this).data('title') // Extract info from data-* attributes


    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.


    // $(".modal-body #bookId").val( myBookId );

    $('.modal-title').text(title)
    $('.modal-body p').text(content)

});
</script>
<?php include 'footer.php';?>