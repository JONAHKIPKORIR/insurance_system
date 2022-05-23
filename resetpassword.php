

<?php
$success="";
$msg="";

if (isset($_SESSION['ROLE'])) {
    require 'top.inc.php';
}


if (isset($_POST['re_password'])) {
    $new_pass=$_POST['new_pass'];
    $re_pass=$_POST['re_pass'];

    if (empty($_POST['new_pass']) ){
        $msg="New Password Cannot be empty";
    }
    if (empty($_POST['re_pass']) ){
        $msg="Confirm New Password Cannot be empty";
    }
    if (!(empty($_POST['new_pass'])) && !(empty($_POST['re_pass'])) && $new_pass!=$re_pass) {
        $msg="New Password and Confirm New Password not matching";
    }
    $eid=$_SESSION['USER_ID'];
    if (!(empty($_POST['new_pass'])) && !(empty($_POST['re_pass'])) && $new_pass==$re_pass) {
        $update_pass=mysqli_query($con,"UPDATE USERS SET password='$new_pass' WHERE id='$eid' " );
        echo "<script>alert('Password Succesfully Updated'); window.location='index.php'</script>";        
    }
  // echo "<script>alert('update pas')</script>";
}

?>
<style>
         :root{
            --body-color:#E5E7E8;
            --menu-bgcolor:#800000;
            --text-color-menu:rgb(93, 93, 93);
            --text-bgcolor-hover:rgba(204, 191, 191, 0.582);
            --text-bgcolor-light:rgb(165, 162, 162);
            --border-bottom:rgb(197, 180, 180);
        }
        .wrapper {
            width: 1
        
        }
        .container {
            background: cadetblue;
            margin: 0 auto;
            border: 1px solid #f3f3f3;
            max-width: 500px;
            width: 70%;
            margin-top: 20px;
            padding: 20px 30px;
            border-radius: 5px;
            
        }
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .container-title {
            text-align: start;
            padding: 10px;
            color: #fff;
            font-size: 40px;
            text-align: center;
        }
        .container label{
            font-size: 20px;
            margin-bottom: 10px;
        }
        .container input{
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            outline: none;
            border:none;
            color: var(--menu-bgcolor);
            margin: 10px;
            
        }
        .container input:focus{
            border: 2px solid cadetblue;
        }
        .btnsignup{
            padding: 10px 20px;
            background: var(--menu-bgcolor);
            color: #fff;
            display: inline-block;
            outline: none;
            border: none;
            margin: 20px 0 ;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            width: 100%;
        }
        .btn:hover{
            color: cadetblue;
            text-decoration: underline;
        }p.linksignin {
            text-align: center;
            font-size: 18px;
            margin: 20px;
        }
        .msg{
            color: #ff4000;
            font-size: 20px;
            padding: 10px;
        }

    </style>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="wrapper">
            
      <div class="container">
             <div class="container-title">
                Reset Password
                </div>
        <div class="form">
            <form action="" method="post">
                <div class="success"><?php echo $success;  ?></div>
               
               <!--
                    <div class="form-group">
                    <label>Email Address</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
             -->
                <div class="form-group">
                    <label>New Password</label><br>
                    <input type="password" name="new_pass" id="showPass" class="form-control" placeholder="New Password" >
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label><br>
                    <input type="password" name="re_pass" id="showPass" class="form-control" placeholder="Confirm New Password" >
                </div>
                <div>
                <br>
                    <!--
                        <span>Show Password <input type="checkbox" onclick="showHidePassword()"></span>
                    -->
                </div>

                <button type="submit" name="re_password" class="btnsignup  ">Update Pass</button><br>
                <p class="linksignin"><a class="btnsignin" href="login.php">Sign In</a></p>
                <div class="msg"><?php echo $msg ?></div>
            </form>
          </div>
    
            
        </div>
    </div>
<script src="js/script.js" type="text/javascript"></script>
    <?php
    
    require 'includes/footer.inc.php';

    ?>