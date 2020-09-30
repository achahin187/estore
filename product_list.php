<?php include "include/header.php"  ?>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>product list</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- product list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form action="#">
                            <input type="text" name="#" placeholder="Search keyword">
                            <i class="ti-search"></i>
                        </form>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">

                                <?php
                                $query = "SELECT * FROM category ORDER BY id DESC";
                                $res = mysqli_query($conn, $query);
                                $nom = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $nom++
                                ?>
                                <p><a
                                        href="product_list.php?id=<?php echo $row['id'] ?>"><?php echo $row['categoryName'] ?></a>
                                </p>

                                <?php
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Type <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                <p><a href="#">Type 1</a></p>
                                <p><a href="#">Type 2</a></p>
                                <p><a href="#">Type 3</a></p>
                                <p><a href="#">Type 4</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="product_list">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_item">
                                <?php
                                $query = "SELECT * FROM products ORDER BY id DESC";
                                $res = mysqli_query($conn, $query);
                                $nom = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $nom++
                                ?>
                                <img src="./admin/images/<?php echo $row['productImage'] ?>" alt="" class="img-fluid">
                                <h3> <a href="single-product.html"><?php echo $row['productName'] ?></a> </h3>
                                <p>From $5</p>
                                <?php
                                }

                                ?>


                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_product_item">
                                <?php
                                $query = "SELECT * FROM products ";
                                $res = mysqli_query($conn, $query);
                                $nom = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $nom++
                                ?>
                                <img src="./admin/images/<?php echo $row['productImage'] ?>" alt="" class="img-fluid">
                                <h3> <a href="single-product.html"><?php echo $row['productName'] ?></a> </h3>
                                <p>From $5</p>
                                <?php
                                }

                                ?>


                            </div>
                        </div </div>
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- product list part end-->

<!-- client review part here -->
<section class="client_review">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="client_review_slider owl-carousel">
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help
                            alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_1.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help
                            alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_2.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help
                            alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- client review part end -->

<!-- Shop Method Start-->
<div class="shop-method-area section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-package"></i>
                    <h6>Free Shipping Method</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-unlock"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-reload"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->

<!-- subscribe part here -->
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                        sources credibly innovate granular internal .</p>
                    <div class="subscribe_form">
                        <input type="email" placeholder="Enter your mail">
                        <a href="#" class="btn_1">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe part end -->
<?php include 'include/footer.php'   ?>