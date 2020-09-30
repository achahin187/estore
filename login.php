<?php 
ob_start();
include "include/header.php" ;
$msg="";

if(isset($_POST['log'])){

$username=$_POST['username'];
$_SESSION['username']=$_POST['username'];
$password=$_POST['password'];

if(empty($_POST['username'])){

    $msg="<div class='alert alert-secondary' role='alert'>
    pleas write your username!
  </div>";
            }elseif(empty($_POST['password'])){

    $msg="<div class='alert alert-secondary' role='alert'>
    pleas write your password!
  </div>";
           }else 
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($res);
          if (in_array($username, $row) && (in_array($password, $row))) {
            session_start();
            $_SESSION['username'] = $_POST['_username'];
            if ($row['admin'] == ""){
                
            $_SESSION['username'] = $username;

            header("location:real-user\home.php");
            }

          else{
            $_SESSION['username'] = $username;

            header("location:admin\admin.php");}
      
 
     
}else{

    $msg="<div class='alert alert-secondary' role='alert'>
    Username or password is invalid !!
  </div>";
    

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
                        <h2>Login</h2>
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
                        <a href="signup.php" class="btn_3">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h4><?php  echo$msg;  ?></h4>

                        <h3>Welcome Back ! <br>
                            Please Sign in now</h3>
                        <form class="row contact_form" action="" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="username" value="" placeholder="Username"
                                    id="username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" name="password" value=""
                                    placeholder="Password" id="password">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3" name="log" id="btn">
                                    log in
                                </button>
                                <a class="lost_pass" href="#">forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

<?php include 'include/footer.php'   ?>