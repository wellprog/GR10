<div>
    <form method="POST" action="/likes/like">
        <input type="hidden" name="Module" value="<?= $MODEL["module"] ?>" />
        <input type="hidden" name="ModuleId" value="<?= $MODEL["id"] ?>" />
        <button type="submit">Like - <?= $MODEL["likes"] ?></button>
    </form>
</div>