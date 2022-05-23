<?php 
require 'db.inc.php';

$success="logged in succesfully";
 $msg="Error loggin in";
$address='';
 
if (isset($_POST['submit'])) {

    $fname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lname=mysqli_real_escape_string($con,$_POST['lastname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    //$category_id=mysqli_real_escape_string($con,$_POST['category_id']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $birthday=mysqli_real_escape_string($con,$_POST['birthday']);
    $pass=mysqli_real_escape_string($con,$_POST['password']);
    
    /*if ($id>0) {
        $sql=mysqli_query($con,"update users set name='$name',email='$email', mobile='$mobile',category_id='$category_id',address='$address',birthday='$birthday', password='$pass' where id='$id' ");
    }else{
    */
        $sql=mysqli_query($con,"insert into users(firstname,lastname,email,mobile,address,birthday,password,role) values('$fname','$lname','$email','$mobile','$address','$birthday','$pass','2')");
    //}
    header('location:login.php');
    die();
    echo "working";

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">   -->
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
            width: 100%;
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
</head>
<body>
 <div class="wrapper">
            
      <div class="container">
             <div class="container-title">
                Sign Up
                </div>
        <div class="form">
            <form action="" method="post">
                <div class="success"><?php //echo $success;  ?></div>

                <div class="form-group">
                    <label>First Name</label><br>
                    <input type="name" name="firstname" class="form-control" placeholder="Firstname e.g Jonah" required>
                </div>
                <div class="form-group">
                    <label>Lastt Name</label><br>
                    <input type="name" name="lastname" class="form-control" placeholder="Lastname e.g Kiplimo" required>
                </div>

                <div class="form-group">
                    <label>Email Address</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Email e.g Jonah.Kiplimo@gmail.com" required>
                </div>
                <div class="form-group">
                <label>Mobile</label><br>
                <input type="number" name="mobile" value="<?php echo $mobile;   ?>" id="mobile" class="form-control" placeholder="Mobile e.g 0727760375" required>
               </div>

               <div class="form-group">
                <label for="address" class="form-control-label">Address</label><br>
                <input type="text" name="address" value="<?php echo $address;   ?>" id="address" class="form-control" placeholder="Address e.g Umoja Tena-Nairobi" required>
                </div>

                <div class="form-group">
                    <label for="birthday" class="form-control-label">Birthday</label><br>
                    <input type="date" name="birthday" value="<?php echo $birthday;   ?>" id="birthday" class="form-control" placeholder="Birthdate e.g 31/12/1998" required>
                </div>

                <div class="form-group">
                    <label>Password</label><br>
                   <!-- <input type="password" name="password" id="showPass" class="form-control" placeholder="password" required>  -->

                    <input type="password" name="password" id="password" class="form-control" placeholder="password." required>
                    <br>
                    
                </div>
                <div class="form-group">
                    <label">Confirm_Password</label><br>
                    <input type="password" name="confirm_password" class="form-control" placeholder="confirm_password" required>
                </div>
                <!--
                    <span>Show Password <input type="checkbox" onclick="showOrHidePass()"/></span>
                -->
                <button type="submit" class="btnsignup  " name="submit">Sign Up</button><br>
                
                <div class="msg"><?php //echo $msg ?></div>

            </form>
        </div>
            
             
               
            <p class="linksignin">Already Have an account? <a class="btnsignin" href="login.php">Sign In</a></p>
            
        </div>
    </div>

    <script src="" type="text/javascript">
       

        function showOrHidePass() {
            var state=false;

            if (state) {
                document.getElementById("password").setAttribute("type","password");
                state=false;
            }else{
                document.getElementById("password").setAttribute("type","text");
                state=true;
            }
        }
            /*show password functionality */
                    /*function showHidePassword() {
                        let show=document.querySelectorAll('showPass');
                        if (show.type=='password') {
                            show.type='text';
                        } else {
                            show.type='password';
                        }
                    }
                    */
    </script>
</body>
</html>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    

<form action="" method="post">
                <div class="success"><?php echo $success;  ?></div>
                <div class="form-group">
                    <label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required>
                </div>
                <div class="form-group">
                    <label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                
                <div class="form-group">
                    <label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label">confirm_Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="confirm_password" required>
                </div>
                <div class="form-group">
                <label for="mobile" class="form-control-label">Mobile</label>
                <input type="number" name="mobile" value="<?php echo $mobile;   ?>" id="mobile" class="form-control" placeholder="Mobile" required>
               </div>

               <div class="form-group">
                <label for="address" class="form-control-label">Address</label>
                <input type="text" name="address" value="<?php echo $address;   ?>" id="address" class="form-control" placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label for="birthday" class="form-control-label">Birthday</label>
                    <input type="date" name="birthday" value="<?php echo $birthday;   ?>" id="birthday" class="form-control" placeholder="Birthdate" required>
                </div>
                <button type="submit" class="btn " name="submit">Sign Up</button>
                <div class="msg"><?php echo $msg ?></div>
            </form>
</body>
</html>
-->
<?php
require 'includes/footer.inc.php';
?>