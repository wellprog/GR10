<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <h1>Добавление / Редактирование Голосования</h1>

                <form method="POST">
                    <table class="table">
                        <tr>
                            <th>Заголовок</th>
                            <td>
                                <input type="text" name="Title" value="<?= $MODEL["Vote"]["Title"] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <td>
                                <textarea name="Text"><?= $MODEL["Vote"]["Text"] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Text');
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <th>Могут ли голосовать анонимы</th>
                            <td>
                                <select name="IsAnonym">
                                    <option value="1" <?= $MODEL["Vote"]["IsAnonym"] == 1 ? "selected" : "" ?>>Могут</option>
                                    <option value="0" <?= $MODEL["Vote"]["IsAnonym"] == 0 ? "selected" : "" ?>>Не могут</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Тип голосования</th>
                            <td>
                                
                                <input type="radio" name="Type" id="type_multi" value="1" <?= $MODEL["Vote"]["Type"] == 1 ? "checked" : "" ?>>
                                <label for="type_multi">Множественный выбор</label>

                                <br />
                                
                                <input type="radio" name="Type" id="type_single" value="0" <?= $MODEL["Vote"]["Type"] == 0 ? "checked" : "" ?>>
                                <label for="type_single">Единичный выбор</label>
                            </td>
                        </tr>

                        <tr>
                            <th>Дата начала</th>
                            <td>
                                <input type="datetime-local" value="<?php 
                                        $d = new DateTime($MODEL["Vote"]["StartDate"]); 
                                        echo $d->format("Y-m-d\TH:i");
                                    ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Дата окончания</th>
                            <td>
                                <input type="datetime-local" value="<?php 
                                        $d = new DateTime($MODEL["Vote"]["EndDate"]); 
                                        echo $d->format("Y-m-d\TH:i");
                                    ?>" />
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>