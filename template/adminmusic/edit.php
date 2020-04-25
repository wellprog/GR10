<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование Музыки</h1>

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="Id" value="<?= $MODEL["item"]["Id"] ?>" />
                    <input type="hidden" name="File" value="<?= $MODEL["item"]["File"] ?>" />
                    <table class="table">
                        <tr>
                            <th>Наименование</th>
                            <td>
                                <input type="text" name="Title" value="<?= $MODEL["item"]["Title"] ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Описание</th>
                            <td>
                                <textarea name="Description"><?= $MODEL["item"]["Description"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Description');
                                </script>
                            </td>
                        </tr>

                        <tr>
                            <th>Автор</th>
                            <td>
                                <input type="text" name="Autor" value="<?= $MODEL["item"]["Autor"] ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Файл</th>
                            <td>
                                <audio controls id="main_sound">
                                    <source src="/content/music/<?= $MODEL["item"]["File"] ?>">
                                </audio>
                                <input id="main_file_upload" type="file" name="file" onchange="readURL(this);" />
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
                $('#main_sound').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>