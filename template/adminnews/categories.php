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
            <?php foreach ($MODEL["Cats"] as $row): ?>
                <tr>
                    <td><?= $row["Id"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="/adminnews/editcategory" class="btn btn-primary">Добавить</a>