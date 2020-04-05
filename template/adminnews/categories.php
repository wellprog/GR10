<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Категории новостей</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MODEL["Cats"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["description"] ?></td>
                                    <td>
                                        <a href="/adminnews/editcategory/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/adminnews/deletecategory/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                        <a href="/adminnews/news/<?= $row["Id"] ?>" class="btn btn-light">Посмотреть новости</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="/adminnews/editcategory" class="btn btn-primary">Добавить</a>


            </div>
        </div>
    </div>
</div>