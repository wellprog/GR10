<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">

            <form method="POST">
                <input type="hidden" name="Id" value="<?= $MODEL["item"]["Id"] ?>" />
                <input type="hidden" name="UserId" value="<?= $MODEL["user"]["Id"] ?>" />
                <table class="table">
                    <tr>
                        <th>Имя</th>
                        <td><?= $MODEL["user"]["Name"] ?></td>
                    </tr>
                    <tr>
                        <th>Фамилия</th>
                        <td><?= $MODEL["user"]["LastName"] ?></td>
                    </tr>
                    <tr>
                        <th>Логин</th>
                        <td><?= $MODEL["user"]["Login"] ?></td>
                    </tr>
                    <tr>
                        <th>Текст страницы</th>
                        <td>
                            <textarea name="Text"><?= $MODEL["item"]["Text"] ?></textarea>
                            <script>
                                CKEDITOR.replace('Text');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <th>Страница приватная</th>
                        <td>
                            ДА  <input type="radio" name="IsActive" value="0" <?= $MODEL["item"]["IsActive"] ? "" : "checked" ?>> <br />
                            Нет <input type="radio" name="IsActive" value="1" <?= $MODEL["item"]["IsActive"] ? "checked" : "" ?>> <br />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right">
                            <input type="submit" value="Сохранить" />
                        </td>
                    </tr>
                </table>
            </form>


            </div>
        </div>
    </div>
</div>