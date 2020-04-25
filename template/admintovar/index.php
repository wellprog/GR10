<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Товары</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MODEL["Tovars"] as $row) : ?>
                                <tr>
                                    <td><?= $row["Id"] ?></td>
                                    <td><?= $row["Title"] ?></td>
                                    <td><?= $row["Price"] ?></td>
                                    <td>
                                        <a href="/admintovar/edit/<?= $row["Id"] ?>" class="btn btn-secondary">Редактировать</a>
                                        <a href="/admintovar/delete/<?= $row["Id"] ?>" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <a href="/admintovar/edit" class="btn btn-primary">Добавить</a>

            </div>
        </div>
    </div>
</div>