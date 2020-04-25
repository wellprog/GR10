<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Музыка</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Автор</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MODEL["items"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["Title"] ?></td>
                                    <td><?= $row["Autor"] ?></td>
                                    <td>
                                        <a href="/adminmusic/edit/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/adminmusic/delete/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="/adminmusic/edit" class="btn btn-primary">Добавить</a>

            </div>
        </div>
    </div>
</div>