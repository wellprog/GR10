<div class="comments-area">
    <h4><?= count($MODEL["comments"]) ?> Коментариев</h4>

    <?php foreach($MODEL["comments"] as $comment): ?>
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <!-- <div class="thumb">
                    <img src="img/comment/comment_1.png" alt="">
                </div> -->
                <div class="desc">
                    <p class="comment">
                        <?= $comment["Coment"] ?>
                        <td><?= ExecPath("likes", "widget", ["comment", $comment["Id"]]) ?></td>
                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5>
                                <a href="#"><?= $comment["UserName"] ?></a>
                            </h5>
                            <p class="date"><?= $comment["CreateDate"] ?></p>
                        </div>
                        <!-- <div class="reply-btn">
                            <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<div class="comment-form">
    <h4>Leave a Reply</h4>
    <form class="form-contact comment_form" action="/comments/save/<?= $MODEL["module"] ?>/<?= $MODEL["record"] ?>" id="commentForm" method="POST">
        <div class="row">
            <?php if ($MODEL["showName"]): ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
        </div>
    </form>
</div>