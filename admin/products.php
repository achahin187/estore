<?php include 'include/connectDB.php';
include 'include/header.php'; ?>

<?php
$msg = '';
if (isset($_POST['add'])) {
    $product = $_POST['product'];
    $pro_cate = $_POST['categoryName'];
    $imageName = $_FILES['productImage']['name'];
    $imageTmp = $_FILES['productImage']['tmp_name'];
    if (empty($_POST['product'])) {

        $msg = "<div class='alert alert-danger' role='alert'>
                write Product Name!
                </div>";
    } elseif (empty($_POST['categoryName'])) {
        $msg = "<div class='alert alert-danger' role='alert'>
        Choose Category!
        </div>";
    } else {
        $pro_image = rand(0, 1000) . " " . $imageName;
        move_uploaded_file($imageTmp, "images\\" . $pro_image);
        $query = "INSERT INTO products (productName,pro_category,productImage) VALUES ('$product','$pro_cate','$pro_image')";
        $res = mysqli_query($conn, $query);
        $msg = "<div class='alert alert-danger' role='alert'>
        product Added!
        </div>";
    }
}


?>











<!---end navbar--->

<!---start content-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-area">
                <ul class="side">
                    <li><a href="admin.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>Categories</span>
                        </a>
                    </li>
                    <!----articles---->


                    <!--------------------------------->
                    <li><a href="products.php">
                            <span><i class="fab fa-blogger-b"></i></span>
                            <span>products</span>
                        </a>
                    </li>
                    <li><a href="logout.php">
                            <span><i class="fas fa-sign-out-alt"></i>

                            </span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">
                <div class="add-category">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <h4><?php echo $msg; ?></h4>

                        <div class="form-group" style="margin: 10px">
                            <label for="formGroupExampleInput">New product</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="write new product" name="product">
                            <select class="form-control" id="m1" name="categoryName" s>
                                <?php
                                $msg = '';

                                $query = "SELECT * FROM category order by id desc ";
                                $res = mysqli_query($conn, $query);
                                $nom = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $nom++

                                ?>
                                <option><?php echo $row['categoryName'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="form-group" style="margin-top:10px">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                    name="productImage">
                            </div>

                            <button type="submit" class="btn btn-secondary" name="add"
                                style="margin-top:10px">Add</button>
                        </div>
                    </form>
                </div>
                <!--display category-->

                <?php
                $msg = '';

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "DELETE  FROM products WHERE id='$id'";
                    $res = mysqli_query($conn, $query);
                    $msg = "<div class='alert alert-primary' role='alert'>
product Deleted!
</div>";
                }

                ?>
                <div class="display-cat mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <th>product_Num</th>
                            <th>product_Name</th>
                            <th>product_Category</th>
                            <th>product_image</th>
                            <th>Date</th>
                            <th>Edit</th>

                        </tr>
                        <?php
                        $query = "SELECT * FROM products ORDER BY id DESC";
                        $res = mysqli_query($conn, $query);
                        $row = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $nom++

                        ?>
                        <tr>
                            <td><?php echo $nom ?></td>
                            <td><?php echo $row['productName'] ?></td>
                            <td><?php echo $row['pro_category'] ?></td>
                            <td><img src="images/<?php echo $row['productImage']  ?>" alt="product"
                                    style="height: 120px; width:150px"></td>
                            <td><?php echo $row['productDate'] ?></td>
                            <td> <a href="products.php?id=<?php echo $row['id'] ?>"> <button type="submit"
                                        class="btn btn-danger">Delete</button>
                                </a></td>
                        </tr>

                        <?php
                        }

                        ?>



                    </table>
                </div>
                <!-------------------->
            </div>
        </div>
    </div>
</div>













<?php include 'include/footer.php'  ?>