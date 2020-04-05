<?php foreach($MODEL["items"] as $value): ?>
    <li><a href="/news/category/<?= $value["Id"] ?>"><?= $value["name"] ?></a></li>
<?php endforeach; ?>
