<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование товара</h1>

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="Id" value="<?= $MODEL["Tovar"]["Id"] ?>" />
                    <table class="table">
                        <tr>
                            <th>Наименование</th>
                            <td>
                                <input type="text" name="Title" value="<?= $MODEL["Tovar"]["Title"] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <td>
                                <textarea name="Description"><?= $MODEL["Tovar"]["Description"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('short_text');
                                </script>
                            </td>
                        </tr>

                        <tr>
                            <th>Тип</th>
                            <td>
                                <input type="text" name="Type" value="<?= $MODEL["Tovar"]["Type"] ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Цeна</th>
                            <td>
                                <input type="text" name="Price" value="<?= $MODEL["Tovar"]["Price"] ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Есть на складе</th>
                            <td>
                                Да <input type="radio" name="IsPresent" value="1" <?php if ($MODEL["Tovar"]["IsPresent"] == 1) echo "checked" ?> /> <br />
                                Нет <input type="radio" name="IsPresent" value="0" <?php if ($MODEL["Tovar"]["IsPresent"] == 0) echo "checked" ?> />
                            </td>
                        </tr>

                        <tr>
                            <th>Скидка при покупки</th>
                            <td>
                                <input type="text" name="BuyDiscount" value="<?= $MODEL["Tovar"]["BuyDiscount"] ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Главное фото</th>
                            <td>
                                <input type="file" name="main_photo" />
                            </td>
                        </tr>

                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>