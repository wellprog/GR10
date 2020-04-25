<div class="popular_places_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="filter_result_wrap">
                    <h3>Filter Result</h3>
                    <div class="filter_bordered">
                        <div class="filter_inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_select">
                                        <select id="tovar_type" onchange="SortIt();">
                                            <option data-display="Тип товара" value="">Тип товара</option>
                                            <?php foreach($MODEL["types"] as $t): ?>
                                                <option value="<?= $t["Type"] ?>"><?= $t["Type"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="range_slider_wrap">
                                        <span class="range">Prise range</span>
                                        <div id="slider-range"></div>
                                        <p>
                                            <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-weight:400;">

                                            <input type="hidden" id="min_price" value="0" />
                                            <input type="hidden" id="max_price" value="600" />
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- <div class="reset_btn">
                            <button class="boxed-btn4" type="submit">Reset</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">

                    <?php foreach($MODEL["items"] as $v): ?>
                    <div class="col-lg-6 col-md-6 tovar" data-type="<?= $v["Type"] ?>" data-price="<?= $v["Price"] ?>">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="/content/img/<?= $v["Pictures"] ?>" alt="">
                                <a href="#" class="prise">$<?= $v["Price"] ?></a>
                            </div>
                            <div class="place_info">
                                <a href="/shop/item/<?= $v["Id"] ?>">
                                    <h3><?= $v["Title"] ?></h3>
                                </a>
                                <p><?= $v["ShortDescription"] ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            <a class="boxed-btn4" href="#">More Places</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function SortIt() {
        var type =  $("#tovar_type").val();
        var min =   parseInt($("#min_price").val());
        var max =   parseInt($("#max_price").val());

        $(".tovar").css("display", "block");
        $(".tovar").each(function (i, e) {
            var el = $(e);
            var t = el.data("type");
            var p = parseInt(el.data("price"));

            if (type != "")
                if (t != type)
                    el.css("display", "none");

            if (p < min || p > max)
                el.css("display", "none");
        });

    }
</script>