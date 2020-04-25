<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование товара</h1>

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="Id" value="<?= $MODEL["Tovar"]["Id"] ?>" />
                    <input type="hidden" name="Pictures" value="<?= $MODEL["Tovar"]["Pictures"] ?>" />
                    <table class="table">
                        <tr>
                            <th>Наименование</th>
                            <td>
                                <input type="text" name="Title" value="<?= $MODEL["Tovar"]["Title"] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Краткое Описание</th>
                            <td>
                                <textarea name="ShortDescription"><?= $MODEL["Tovar"]["ShortDescription"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('ShortDescription');
                                </script>
                            </td>
                        </tr>

                        <tr>
                            <th>Описание</th>
                            <td>
                                <textarea name="Description"><?= $MODEL["Tovar"]["Description"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Description');
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
                                <img id="main_img" src="/content/img/<?= $MODEL["Tovar"]["Pictures"] ?>" style="max-width:300px;" />
                                <input id="main_img_upload" type="file" name="main_photo" onchange="readURL(this);" />
                            </td>
                        </tr>

                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#main_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>