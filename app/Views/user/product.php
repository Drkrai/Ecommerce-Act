<section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Products</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="productView"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="productView"><i class="fa fa-star"></i></a></li>
                                            <li><a href="productView"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/men-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <?php foreach($product as $prod):?>
                                    <h4><?=$prod['name']?></h4>
                                    <span>$<?=$prod['price']?></span>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>