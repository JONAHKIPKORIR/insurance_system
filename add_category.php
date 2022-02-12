

<?php

require('top.inc.php ');
if ($_SESSION['ROLE'] !=1) {
    header('location:add_user.php?id='.$_SESSION['USER_ID']);
    die();
}
$category='';
$id='';

if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * FROM category where id=$id");
    $row=mysqli_fetch_assoc($res);
    
    $category=$row['category'];
    //print_r($row);
}

if (isset($_POST['category'])) {
    $category=mysqli_real_escape_string($con,$_POST['category']);
    
    if ($id>0) {
        $sql=mysqli_query($con,"update category set category='$category' where id='$id' ");
    }else{
        $sql=mysqli_query($con,"insert into category(category) values('$category')");
    }
    header('location:index.php');
    die();

}

?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="content">
    <div class="card">
        <div class="card-header"><strong>Category </strong><small>Form</small></div>
        <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
                <label for="category" class="form-control-label">Category Name</label>
                <input type="text" name="category" value="<?php echo $category;   ?>" id="category" class="form-control" placeholder="Categoryt Name" required>
            </div>

            
            <button type="submit" id="payment-option" class="btn btn-info"><span id="payment-option-amount">Submit</span></button>
            </form>  
        </div>
    </div>
</div>


<?php  

require('includes/footer.inc.php');  

?>