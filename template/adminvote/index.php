<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Голосования</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Дата начала</th>
                                <th>Дата окончания</th>
                                <th>Тип голосования</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($MODEL["Votes"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["Title"] ?></td>
                                    <td><?= $row["Text"] ?></td>
                                    <td><?= $row["StartDate"] ?></td>
                                    <td><?= $row["EndDate"] ?></td>
                                    <td>
                                        <?= $row["IsAnonym"] == 1 ? "Анонимный" : "Не Анонимный" ?>
                                         ---
                                        <?php
                                            if ($row["Type"] == 1) {
                                                echo "Ед. выбор";
                                            } else {
                                                echo "Мн. выбор";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/adminvote/edit/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/adminvote/delete/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

                <a href="/adminvote/edit" class="btn btn-primary">Добавить</a>


            </div>
        </div>
    </div>
</div>