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
                        <td><input type="text" name="Text" id="TextMessage" value="" /></td>
                        <td><button type="button" onclick="Send()">Отправить</button></td>
                    </tr>
                </table>


            </div>
        </div>
    </div>
</div>


<script>
    id = <?= $id ?>;
    room = "<?= $room  ?>";

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

        for (var i = 0; i < data.length; i++) {
            var el = data[i];

            table.append("<tr><th>" + el.UserName + "</th><td>" + el.Text + "</td></tr>");
            id = el.Id;
        }
    }
</script>