<?php 
include 'header.php';
include 'script/dbcon.php'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
.container {
    max-width: 1170px;
    margin: auto;
}

img {
    max-width: 100%;
}

.inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%;
    border-right: 1px solid #c4c4c4;
    height: inherit;
}

.inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
    height: inherit;
}

.top_spac {
    margin: 20px 0 0;
}


.recent_heading {
    float: left;
    width: 40%;
}

.srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
    padding:
}

.headind_srch {
    padding: 10px 29px 10px 20px;
    overflow: hidden;
    border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
}

.srch_bar input {
    border: 1px solid #cdcdcd;
    border-width: 0 0 1px 0;
    width: 80%;
    padding: 2px 0 4px 6px;
    background: none;
}

.srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
}

.srch_bar .input-group-addon {
    margin: 0 0 0 -27px;
}

.chat_ib h5 {
    font-size: 15px;
    color: #464646;
    margin: 0 0 8px 0;
}

.chat_ib h5 span {
    font-size: 13px;
    float: right;
}

.chat_ib p {
    font-size: 14px;
    color: #989898;
    margin: auto
}

.chat_img {
    float: left;
    width: 11%;
}

.chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
}

.chat_people {
    overflow: hidden;
    clear: both;
}

.chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
}

.inbox_chat {
    height: 100%;
    padding-bottom: 0px;
    overflow-y: scroll;
}

.active_chat {
    background: #ebebeb;
}

.incoming_msg_img {
    display: inline-block;
    width: 6%;
}

.received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
}

.received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
}

.received_withd_msg {
    float: left;
    width: fit-content;
}

.mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
    height: inherit;
}

.sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0;
    color: #fff;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
}

.sent_msg {
    float: right;
    width: fit-content;
}

.input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
}

.type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
}

.msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
}

.messaging {
    height: 100%;
    padding: 0;
}

.msg_history {
    height: 93%;
    overflow-y: auto;
}
</style>
<!-- Code Here -->
<div class="messaging">
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h4>Chat</h4>
                </div>
                <div class="srch_bar">
                    <div class="stylish-input-group">
                        <input type="text" class="search-bar" placeholder="Search">
                        <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="inbox_chat">
                <?php 
                $result = getMentorById($conn,1);
                while($row = $result->fetch_array()){
                    $result1 = getGuruById($conn,$row["guruid"]);
                    $guru = $result1->fetch_assoc();
                    $result5 = getLatestGuruChatById($conn,$guru["id"]);
                    $guruChat =  $result5->fetch_assoc();

                   
                ?>
                <div class="chat_list" >
                    <div class="chat_people">
                        <div class="chat_img"> <img src="<?php echo $guru["image"];?>" alt="sunil">
                        </div>
                        <div class="chat_ib">
                            <h5><?php echo $guru["name"];?><span class="chat_date"><?php echo $guruChat["date"];?></span></h5>
                            <p><?php echo $guruChat["content"];?></p>
                            <input type="hidden" class="guruid" value="<?php echo $guru["id"]; ?>" > 
                        </div>
                    </div>
                </div>

                <?php 
                }
                ?>
            </div>
        </div>
        <div class="mesgs">
            <div class="msg_history">
                <?php 
                
                if(isset($_GET['guruid'])){
                    $currentguruid = $_GET['guruid'];
                }else {
                    $result4 = getLatestChatById($conn,1);
                    $latestchat = $result4->fetch_assoc();
                    $currentguruid=$latestchat["guruid"];
                }

                $result2 = getChatById($conn,$currentguruid);
                $result3 = getGuruById($conn,$currentguruid);
                $guru1 = $result3->fetch_assoc();
                while($msgRow = $result2->fetch_array()){
                    if ($msgRow["type"] == 0){
                        ?>
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p><?php echo $msgRow["content"];?></p>
                        <span class="time_date"> <?php echo $msgRow["date"];?></span>
                    </div>
                </div>
                <?php
                    }
                    else{
                        ?>
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="<?php echo $guru1["image"];?>" alt="sunil">
                    </div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p><?php echo $msgRow["content"];?></p>
                            <span class="time_date"> <?php echo $msgRow["date"];?></span>
                        </div>
                    </div>
                </div>


                <?php
                    }
                }
                    
                ?>
            </div>
            <div class="type_msg">
                <div class="input_msg_write">
                    <input type="text" class="write_msg" placeholder="Type a message" id="chatMsg" />
                    <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"
                            onclick="sendChat(<?php echo $guru1['id'];?>,1)"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function sendChat(guruid, userid) {

    event.preventDefault();

    var content = document.getElementById("chatMsg").value;
    if (content != "") {
        $.ajax({
            type: "post",
            url: 'script/send_chat.php',
            data: {
                userid: userid,
                guruid: guruid,
                content: content
            },
            success: function(data) {
                location.reload();

            },
            error: function(data) {
                console.log("error");
            }
        });
    }
}

$(document).on("click", ".chat_list", function() {
    var guruid = $(this).find(".guruid").val(); 
    window.location.replace("chat.php?guruid="+guruid);
});
</script>

<?php include 'footer.php';?>