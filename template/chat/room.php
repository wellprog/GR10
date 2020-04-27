<style>
.full-width {
    display: flex;
}
.full-width .justify-content-center {
  display: flex;
  align-self: center;
  width: 100%;
}

.full-width .lead.emoji-picker-container {
  width: 300px;
  display: block;
}

.full-width .lead.emoji-picker-container input {
  width: 100%;
  height: 50px;
}
</style>


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <table class="table" id="messagetable">
                    <?php 
                    
                    $id = 0;
                    $room = ""; 
                    foreach ($MODEL["Messages"] as $v):
                        $id = $v["Id"];
                        $room = $v["ChatName"] 
                ?>
                    <tr>
                        <th><?= $v["UserName"] ?></th>
                        <td><?= $v["Text"] ?></td>
                    </tr>
                    <?php endforeach; ?>

                </table>

                <table class="table">
                    <tr>
                        <td>
                            <div class="container full-width">
                                <div class="row justify-content-center">
                                        <p class="lead emoji-picker-container">
                                        <textarea id="TextMessage" type="textbox" data-emoji-input="unicode" class="form-control" placeholder="Input field" data-emojiable="true"></textarea>
                                        </p>            
                                </div>
                            </div>
                        </td>
                        <td><button type="button" onclick="Send()">Отправить</button></td>
                    </tr>
                </table>


            </div>
        </div>
    </div>
</div>


<script src="https://onesignal.github.io/emoji-picker/lib/js/config.js"></script>
<script src="https://onesignal.github.io/emoji-picker/lib/js/util.js"></script>
<script src="https://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="https://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js"></script>

<script>


    jQuery(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
    });


    id = <?= $id ?>;
    room =  "<?= urlencode($room)  ?>";

    function Send() {
        text = $("#TextMessage").val();
        $("#TextMessage").val("");

        jQuery.post("/chat/store/" + room + "/", { Text : text }, function(data) {
            draw(data);
        })
    }

    setInterval(function() {
        jQuery.get("/chat/getnext/" + room +"/" + id, function(data) {
            draw(data);
        });
    }, 2000);

    function draw(data) {
        table = $("#messagetable");

        // alert(data);

        // for (var i = 0; i < data.length; i++) {
        //     var el = data[i];

        //     table.append("<tr><th>" + el.UserName + "</th><td>" + el.Text + "</td></tr>");
        //     id = el.Id;
        // }
    }
</script>