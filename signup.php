<?php 
ob_start();
include "include/header.php";
include "include/connectDB.php";

$msg="";
if(isset($_POST['submit'])){

$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['username']=$_POST['username'];
if(empty($_POST['email'])){
    $msg="<div class='alert alert-secondary' role='alert'>
    pleas write your email!
  </div>";
}else if(empty($_POST['username'])){
    $msg="<div class='alert alert-secondary' role='alert'>
    pleas write your username!
  </div>";
}else if(empty($_POST['password'])){
    $msg="<div class='alert alert-secondary' role='alert'>
    pleas write your password!
  </div>";
}else if($_POST['password']!= $_POST['re-password']){
    $msg="<div class='alert alert-secondary' role='alert'>
    your password is invalid!
  </div>";
}else{
$query="SELECT COUNT(username) AS num FROM users WHERE username='$username'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);
if($row['num']>0){
  
  $msg="<div class='alert alert-secondary' role='alert'>
  your username is Existed!
</div>";


}else{
    $_SESSION['username']=$username;

$query="INSERT INTO users (email,username,password) VALUES ('$email','$username','$password') ";
$res=mysqli_query($conn,$query);
$_SESSION['username']=$username;


header('location:real-user/home.php');
}

}

}



?>


<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Sign up</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="login.php" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                    <h4 ><?php  echo$msg;  ?></h4>

                        <h3>Welcome ! <br>
                            Please Sign Up now</h3>
                        <form class="row contact_form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="email" value=""
                                    placeholder="Email">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="username" value=""
                                    placeholder="Username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="re-password" value=""
                                    placeholder="re-Password">
                            </div>
                            <div class="col-md-12 form-group">

                                <button type="submit" value="submit" class="btn_3" name="submit">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

<?php include 'include/footer.php'  
 ?>