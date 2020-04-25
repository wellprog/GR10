<div class="destination_banner_wrap overlay">
    <div class="destination_text text-center">
        <h3><?= $MODEL["item"]["Title"] ?></h3>
        <p>
        <?= $MODEL["item"]["ShortDescription"] ?>
        </p>
    </div>
</div>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>Описание</h3>
                    <?= $MODEL["item"]["Description"] ?>
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Contact for join</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" placeholder="Phone no.">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit">submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>