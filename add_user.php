

<?php

require('top.inc.php ');
$fname='';
$lname='';
$email='';
$mobile='';
$category_id='';
$address='';
$birthday='';
$id='';
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);

    if ($_SESSION['ROLE']==2 && $_SESSION['USER_ID'] !=$id ) {
        die('Access Denied');
    }
    $res=mysqli_query($con,"SELECT * FROM users where id=$id");
    $row=mysqli_fetch_assoc($res);
    
    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $category_id=$row['category_id'];
    $address=$row['address'];
    $birthday=$row['birthday'];
    //print_r($row);
}

if (isset($_POST['submit'])) {
    $fname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lname=mysqli_real_escape_string($con,$_POST['lastname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    $category_id=mysqli_real_escape_string($con,$_POST['category_id']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $birthday=mysqli_real_escape_string($con,$_POST['birthday']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    
    if ($id>0) {
        $sql=mysqli_query($con,"update users set firstname='$fname',lastname='$lname',email='$email', mobile='$mobile',category_id='$category_id',address='$address',birthday='$birthday', password='$pass' where id='$id' ");
    }else{
        $sql=mysqli_query($con,"insert into users(firstname,lastname,email,mobile,category_id,address,birthday,password,role) values('$firstname','$lastname','$email','$mobile','$category_id','$address','$birthday','$pass','2')");
    }
    header('location:user.php');
    die();

}

?>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
     .card-body{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
</style>
<div class="content">
    <div class="card">
        <div class="card-header"><strong> User </strong><small>Form</small></div>
        <div class="card-body">
            <form action="" method="post">
            <!--
                <div class="form-group">
                <label for="name" class="form-control-label"> Name</label>
                <input type="text" name="name" value="<?php echo $name;   ?>" id="name" class="form-control" placeholder="Employee Name" required>
            </div>
             -->
             <div class="form-group">
                    <label>First Name</label><br>
                    <input type="name" name="firstname" value="<?php echo $fname;   ?>" class="form-control" placeholder="Firstname e.g Jonah" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label><br>
                    <input type="name" name="lastname" value="<?php echo $lname;   ?>" class="form-control" placeholder="Lastname e.g Kiplimo" required>
                </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="<?php echo $email;   ?>" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="mobile" class="form-control-label">Mobile</label>
                <input type="number" name="mobile" value="<?php echo $mobile;   ?>" id="mobile" class="form-control" placeholder="Mobile" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-control-label">Password</label>
                <input type="password" name="password" value="<?php echo $pass ?>"  id="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="category_id" class="form-control-label">Category ID</label>
               <select name="category_id" id="category_id">
               <option value="">Select Category</option>
                   <?php   
                   $res=mysqli_query($con,"select * from category order by id asc");
                   while ($row=mysqli_fetch_assoc($res)) { 
                       if ($category_id==$row['id']) {
                           //selected='selected ' means that it will show the category which the id was selected
                            echo "<option selected='selected' value=".$row['id'].">".$row['category']."</option>";
                       }else{
                            echo "<option value=".$row['id'].">".$row['category']."</option>";
                       }
                    } ?>
                  
               </select>
            </div>
            
            <div class="form-group">
                <label for="address" class="form-control-label">Address</label>
                <input type="text" name="address" value="<?php echo $address;   ?>" id="address" class="form-control" placeholder="Address" required>
            </div>

            <div class="form-group">
                <label for="birthday" class="form-control-label">Birthday</label>
                <input type="date" name="birthday" value="<?php echo $birthday;   ?>" id="birthday" class="form-control" placeholder="Birthdate" required>
            </div>

            <?php  if ($_SESSION['ROLE']==1) { ?>
            <button type="submit" name="submit" id="payment-option" class="btn btn-info"><span id="payment-option-amount">Submit</span></button>
            <?php  }  ?>
            </form>  
        </div>
    </div>
</div>


<?php  

require('includes/footer.inc.php');  

?>