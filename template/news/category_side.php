<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Категории</h4>
    <ul class="list cat-list">
        <?php foreach($MODEL as $value): ?>
        <li>
            <a href="/news/category/<?= $value["Id"] ?>" class="d-flex">
                <p><?= $value["name"] ?> &nbsp; </p>
                <p>(<?= $value["newsCount"] ?>)</p>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</aside>