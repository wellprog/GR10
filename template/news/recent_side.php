<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Последние новости</h3>

    <?php foreach ($MODEL as $value): ?>
    <div class="media post_item">
        <img src="/content/img/<?= $value["MainPhoto"] ?>" alt="post" style="width:50px;">
        <div class="media-body">
            <a href="single-blog.html">
                <h3><?= $value["Title"] ?></h3>
            </a>
            <p><?= $value["CreateDate"] ?></p>
        </div>
    </div>
    <?php endforeach; ?>


</aside>