<?php
session_start();
require ('db.inc.php');
$msg="";
$success="";
if (isset($_POST['email'])  && isset($_POST['password'])) {
    
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pass=mysqli_real_escape_string($con,$_POST['password']);

    $res=mysqli_query($con,"select * from users where email='$email' and password='$pass'");
    $count=mysqli_num_rows($res);

    if ($count >0 ) {
        $row=mysqli_fetch_assoc($res);

        $_SESSION['ROLE']=$row['role'];
        $_SESSION['USERNAME']=$row['name'];
        $_SESSION['USER_ID']=$row['id'];

        header('location:index.php');

        //echo  '<pre>';
        //print_r($row);
        //$success='Succesful ';
    }else{
        $msg="Wrong Email/Password /CredentialsNot in Database";
        
    }
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
                Sign In
                </div>
        <div class="form">
            <form action="" method="post">
                <div class="success"><?php echo $success;  ?></div>
                <div class="form-group">
                    <label>Email Address</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label>Password</label><br>
                   <!-- <input type="password" name="password" id="showPass" class="form-control" placeholder="password" required>  -->

                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                    <br>
                    <span>Show Password <input type="checkbox" onclick="showOrHidePass()"/></span>
                </div>


                <button type="submit" class="btnsignup  ">Sign in</button><br>
                <div class="msg"><?php echo $msg ?></div>
            </form>
        </div>
            <?php
             if ($_SESSION['ROLE']!==1) { ?>
               
            <p class="linksignin">Dont Have an account yet? <a class="btnsignin" href="register.php">Sign Up</a></p>
            <?php }?>
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