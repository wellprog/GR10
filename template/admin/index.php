<style>
    .admin-main-menu {
        display: flex;
    }

    .admin-main-menu a {
        display: block;
        width: 200px;
        height: 100px;
        text-align: center;
        border: 1px solid black;
    }
</style>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">


                <div class="admin-main-menu">
                    <a href="/adminnews/news">Новости</a>
                    <a href="/adminnews/categories">Категории новостей</a>
                    <a href="/adminvote">Голосования</a>
                    <a href="/admintovar/">Товары</a>

                    <a href="/admin/pull?rnd=<?= rand() ?>">Обновить сайт</a>
                    
                    <a href="/user/logout">Выход</a>
                </div>


            </div>
        </div>
    </div>
</div>