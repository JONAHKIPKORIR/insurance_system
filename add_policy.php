

<?php

require('top.inc.php ');


if (isset($_POST['submit'])) {
    $category=mysqli_real_escape_string($con,$_POST['category']);
    $policy_type=mysqli_real_escape_string($con,$_POST['policy_type']);
    $sum_assured=mysqli_real_escape_string($con,$_POST['sum_assured']);
    $user_id=$_SESSION['USER_ID'];
    $premium=mysqli_real_escape_string($con,$_POST['premium']);
    $tenure=mysqli_real_escape_string($con,$_POST['tenure']);
    $created_date=mysqli_real_escape_string($con,$_POST['created_date']);
    
    $sql=mysqli_query($con,"insert into policy_tbl(category_id,policy_type,sum_assured,user_id,premium,tenure,created_date,policy_status) 
                values('$category','$policy_type','$sum_assured','$user_id','$premium','$tenure','$created_date',1)");
    header('location:policy.php');
    die();

}

?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="content">
    <div class="card">
        <div class="card-header"><strong> Policy </strong><small>Form</small></div>
        <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
                <label for="category" class="form-control-label">Category</label>
                    <select name="category" id="category">
                    <option value="">Select Category </option>
                        <?php   
                        $res=mysqli_query($con,"select * from category order by category desc");
                        while ($row=mysqli_fetch_assoc($res)) { 
                            echo "<option value=".$row['id'].">".$row['category']."</option>";
                            
                            } ?>
                        
                    </select>
            </div>
            <div class="form-group">
                <label for="policy_type" class="form-control-label">Policy_type ID</label>
                    <select name="policy_type" id="policy_type">
                    <option value="">Select Policy Type</option>
                        <?php   
                        
                        $res=mysqli_query($con,"select * from policy_type order by policy_type desc");
                        while ($row=mysqli_fetch_assoc($res)) { 
                            echo "<option value=".$row['id'].">".$row['policy_type']."</option>";
                            } ?>
                        
                    </select>
            </div>
            <div class="form-group">
                <label for="sum_assured" class="form-control-label"> Sum_assured</label>
                <input type="text" name="sum_assured"  id="sum_assured" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="premium" class="form-control-label">Premium</label>
                <input type="text" name="premium"  id="premium" class="form-control" required >
            </div>

            <div class="form-group">
                <label for="tenure" class="form-control-label">Tenure</label>
                <input type="text" name="tenure"  id="tenure" class="form-control">
            </div>

            <div class="form-group">
                <label for="created_date" class="form-control-label">Created_date</label>
                <input type="date" name="created_date"  id="created_date" class="form-control">
            </div>

            
            
            <button type="submit" name="submit" id="payment-option" class="btn btn-info"><span id="payment-option-amount">Submit</span></button>
            
            </form>  
        </div>
    </div>
</div>


<?php  

require('includes/footer.inc.php');  

?>