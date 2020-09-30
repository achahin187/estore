<?php include 'include/connectDB.php';
include 'include/header.php';
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
                <!-------- add category---->
                <?php
                $msg = '';
                if (isset($_POST['submit'])) {
                    $newCategory = $_POST['new_category'];
                    if (empty($_POST['new_category'])) {

                        $msg = "<div class='alert alert-danger' role='alert'>
                                write Category Name!
                                </div>";
                    } else {
                        $query = "INSERT INTO category (categoryName) VALUES ('$newCategory')";
                        $res = mysqli_query($conn, $query);
                        $msg = "<div class='alert alert-primary' role='alert'>
                        Category Added !
                        </div>";
                    }
                }
                ?>
                <!------- add category--->
                <div class="add-category">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <h4><?php echo $msg; ?></h4>
                        <div class="form-group">
                            <label for="formGroupExampleInput">New Category</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="write new category" name="new_category">
                            <button type="submit" class="btn btn-secondary" name="submit"
                                style="margin-top:10px">Add</button>

                        </div>
                    </form>
                </div>
                <!--display category-->

                <?php
                $msg = '';

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "DELETE  FROM category WHERE id='$id'";
                    $res = mysqli_query($conn, $query);
                    if (isset($res)) {
                        $msg = "<div class='alert alert-primary' role='alert'>
        Category Deleted!
        </div>";
                    }
                }

                ?>
                <div class="display-cat mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <th>Category_Num</th>
                            <th>Category_Name</th>
                            <th>Date</th>
                            <th>Edit</th>

                        </tr>
                        <!-------- fetch category--->
                        <?php

                        $query = "SELECT * FROM category ORDER BY id DESC";
                        $res = mysqli_query($conn, $query);
                        $nom = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $nom++
                        ?>
                        <tr>
                            <td><?php echo $nom ?></td>
                            <td><?php echo $row['categoryName'] ?></td>
                            <td><?php echo $row['categoryDate'] ?></td>
                            <td> <a href="admin.php?id=<?php echo $row['id']  ?>"> <button type="submit"
                                        class="btn btn-danger">Delete</button>
                                </a></td>
                        </tr>
                        <?php
                        }


                        ?>
                        <!-----  fetch cate---->
                        <!--- delete category-->




                    </table>
                </div>
                <!-------------------->
            </div>
        </div>
    </div>
</div>













<?php include 'include/footer.php'  ?>