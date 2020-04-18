<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование Вопроса для - <?= $MODEL["Vote"]["Title"] ?></h1>

                <form method="POST">
                    <table class="table">
                        <tr>
                            <th>Заголовок</th>
                            <td>
                                <input type="text" name="Title" value="<?= $MODEL["Question"]["Title"] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <td>
                                <textarea name="Text"><?= $MODEL["Question"]["Text"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Text');
                                </script>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>