<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<h1>Добавление / Редактирование Новости</h1>

<form method="POST">
    <table class="table">
        <tr>
            <th>Наименование</th>
            <td>
                <input type="text" name="title" value="<?= $MODEL["News"]["Title"] ?>"/>
            </td>
        </tr>
        <tr>
            <th>Текст</th>
            <td>
                <textarea name="text"><?= $MODEL["News"]["Text"] ?></textarea>
                <script>
                        CKEDITOR.replace( 'text' );
                </script>
            </td>
        </tr>
        <tr>
            <th>Категория</th>
            <td>
                <select name="category_id">
                    <?php foreach($MODEL["Categoryes"] as $cat): ?>
                        <option value="<?= $cat["Id"] ?>" 
                            <?php if ($cat["Id"] == $MODEL["News"]["CategoryId"]) echo "selected" ?> 
                        ><?= $cat["name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary" >Сохранить</button>
</form>