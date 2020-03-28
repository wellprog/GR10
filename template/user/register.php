<style>
    .errors li {
        color: red;
    }
</style>

<div>
    <h1>Регистрация</h1>

    <ul class="errors">
       <?php foreach($MODEL["errors"] as $v): ?>
        <li><?= $v ?></li>
       <?php endforeach; ?> 
    </ul>

    <form method="POST">
        <table class="table">
            <tr>
                <th>Имя</th>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <th>Фамилия</th>
                <td><input type="text" name="lastname" /></td>
            </tr>
            <tr>
                <th>Логин</th>
                <td><input type="text" name="login" /></td>
            </tr>
            <tr>
                <th>Пароль</th>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <th>Повторите пароль</th>
                <td><input type="password" name="password1" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Отправить" />
                </td>
            </tr>
        </table>
    </form>
</div>