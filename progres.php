<?php
include "include/connectDB.php";

    $data=strip_tags($_POST['text']);

    $query="SELECT * FROM products WHERE productName LIKE '%".$data."%' ORDER BY id DESC ";
    $res=mysqli_query($conn,$query) or die();
    while($row=mysqli_fetch_object($res)){
?>
<div class="product_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="single_product_item">
                    <h3> <a href="single-product.php"><?php echo $row->productName ?></a>
                    </h3>
                    <img src="./admin/images/<?php echo $row->productImage ?>" alt="img1" class="img-fluid">
                    <p>From $5</p>
                </div>
            </div>
        </div>
    </div>


    <?php
    }
?>