

<?php


require('top.inc.php ');
if ($_SESSION['ROLE'] !=1) {
    header('location:add_user.php?id='.$_SESSION['USER_ID']);
    die();
}
$policy_type='';
$id='';
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM policy_type where id=$id");
    $row=mysqli_fetch_assoc($res);
    
    $policy_type=$row['policy_type'];
    //print_r($row);
}

if (isset($_POST['policy_type'])) {
    $policy_type=mysqli_real_escape_string($con,$_POST['policy_type']);
    
    if ($id>0) {
        $sql=mysqli_query($con,"update policy_type set policy_type='$policy_type' where id='$id' ");
    }else{
        $sql=mysqli_query($con,"insert into policy_type(policy_type) values('$policy_type')");
    }
    header('location:policy_type.php');
    die();

}

?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="content">
    <div class="card">
        <div class="card-header"><strong>Policy_type </strong><small>Form</small></div>
        <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
                <label for="policy_type" class="form-control-label">Policy_type Name</label>
                <input type="text" name="policy_type" value="<?php echo $policy_type;   ?>" id="policy_type" class="form-control" placeholder="Policy_type Name" required>
            </div>

            
            <button type="submit" id="payment-option" class="btn btn-info"><span id="payment-option-amount">Submit</span></button>
            </form>  
        </div>
    </div>
</div>


<?php  

require('includes/footer.inc.php');  

?>