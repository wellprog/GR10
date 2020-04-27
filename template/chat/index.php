<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <form method="POST">
                    <table class="table">
                        <tr>
                            <th>Название комнаты</th>
                            <th>Действие</th>
                        </tr>
                        <?php foreach($MODEL["Rooms"] as $v): ?>
                            <tr>
                                <th><?= $v["ChatName"] ?></th>
                                <td><a class="" href="/chat/room/<?= urlencode($v["ChatName"]) ?>">Перейти</a></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><input type="text" name="ChatName" value=""></td>
                            <td><input type="submit" value="Создать" /></td>
                        </tr>
                    </table>
                </form>
                


            </div>
        </div>
    </div>
</div>