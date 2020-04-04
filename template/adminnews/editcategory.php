<h1>Добавление / Редактирование категории</h1>

<form method="POST">
    <table class="table">
        <tr>
            <th>Наименование</th>
            <td>
                <input type="text" name="name" value="<?= $MODEL["name"] ?>"/>
            </td>
        </tr>
        <tr>
            <th>Описание</th>
            <td>
                <textarea name="description"><?= $MODEL["description"] ?></textarea>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary" >Сохранить</button>
</form>