<?php 
require('top.inc.php');
$success="logged in succesfully";
 $msg="Error loggin in";
$address='';
 
if (isset($_POST['submit'])) {
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    //$category_id=mysqli_real_escape_string($con,$_POST['category_id']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $birthday=mysqli_real_escape_string($con,$_POST['birthday']);
    
    /*if ($id>0) {
        $sql=mysqli_query($con,"update users set name='$name',email='$email', mobile='$mobile',category_id='$category_id',address='$address',birthday='$birthday' where id='$id' ");
    }else{
        
    }

    */
    $sql=mysqli_query($con,"insert into users(name,email,mobile,address,birthday,role) values('$name','$email','$mobile','$address','$birthday','2')");
    header('location:user.php');
    die();

}


?>

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
<?php
require('footer.inc.php');
?>