<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Новости</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Категория</th>
                                <th>Дата создания</th>
                                <th>Кто создал</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MODEL["News"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["Title"] ?></td>
                                    <td><?= $row["CategoryName"] ?></td>
                                    <td><?= $row["CreateDate"] ?></td>
                                    <td><?= $row["UserName"] ?></td>
                                    <td>
                                        <a href="/adminnews/editnews/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/adminnews/deletenews/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="/adminnews/editnews" class="btn btn-primary">Добавить</a>

            </div>
        </div>
    </div>
</div>