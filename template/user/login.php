<style>
    .errors li {
        color: red;
    }
</style>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div>
                    <h1>Вход</h1>

                    <ul class="errors">
                        <?php foreach ($MODEL["errors"] as $v) : ?>
                            <li><?= $v ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <form method="POST">
                        <table class="table">
                            <tr>
                                <th>Логин</th>
                                <td><input type="text" name="login" /></td>
                            </tr>
                            <tr>
                                <th>Пароль</th>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Войти" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>