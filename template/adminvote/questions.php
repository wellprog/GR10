<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Вопросы для голосования - <?= $MODEL["Vote"]["Title"] ?></h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($MODEL["Questions"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["Title"] ?></td>
                                    <td>
                                        <a href="/adminvote/question_edit/<?= $MODEL["Vote"]["Id"] ?>/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/adminvote/question_delete/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

                <a href="/adminvote/question_edit/<?= $MODEL["Vote"]["Id"] ?>" class="btn btn-primary">Добавить</a>


            </div>
        </div>
    </div>
</div>