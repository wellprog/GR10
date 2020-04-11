<aside class="single_sidebar_widget newsletter_widget">
    <h4 class="widget_title">Подписаться на новости</h4>

    <form action="/news/subscribe/<?= $MODEL ?>" method="POST">
        <div class="form-group">
            <input name="email" type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
    </form>
</aside>