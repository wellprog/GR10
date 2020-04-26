<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">

                <table class="table">
                    <tr>
                        <th>Имя</th>
                        <td><?= $MODEL["user"]["Name"] ?></td>
                    </tr>
                    <tr>
                        <th>Фамилия</th>
                        <td><?= $MODEL["user"]["LastName"] ?></td>
                    </tr>
                    <tr>
                        <th>Логин</th>
                        <td><?= $MODEL["user"]["Login"] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?= $MODEL["item"]["Text"] ?>
                        </td>
                    </tr>
                </table>


            </div>
        </div>
    </div>
</div>