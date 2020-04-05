<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование Новости</h1>

                <form method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <th>Наименование</th>
                            <td>
                                <input type="text" name="title" value="<?= $MODEL["News"]["Title"] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Превью текста</th>
                            <td>
                                <textarea name="short_text"><?= $MODEL["News"]["ShortText"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('short_text');
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <th>Текст</th>
                            <td>
                                <textarea name="text"><?= $MODEL["News"]["Text"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('text');
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <th>Главное фото</th>
                            <td>
                                <input type="file" name="main_photo" />
                            </td>
                        </tr>
                        <tr>
                            <th>Категория</th>
                            <td>
                                <select name="category_id">
                                    <?php foreach ($MODEL["Categoryes"] as $cat) : ?>
                                        <option value="<?= $cat["Id"] ?>" <?php if ($cat["Id"] == $MODEL["News"]["CategoryId"]) echo "selected" ?>><?= $cat["name"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>