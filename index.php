
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">



    
</head>
<body>
    
</body>
</html>

<?php
$category='';
require('top.inc.php');
if ($_SESSION['ROLE'] !=1) {
    header('location:add_user.php?id='.$_SESSION['USER_ID']);
    die();
}

if (isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);

    $res=mysqli_query($con,"delete from category where id='$id'");
    header('index.php');  
}



//to select dat from db
$res=mysqli_query($con,'SELECT * FROM category order by id desc');



?>
<section class="boxes">
    <div class="box">
        <div class="box-content">
             <img class="img" src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM users order by id desc');
                $countusers=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countusers ?></h2>
                     <span><a href="user.php">View Total Users</a> </span>
                 </div>
        </div>
        <div class="box-content">
             <img class="img" src="images/me.png" alt="" >
                <?php
                 $num_row=mysqli_query($con,'SELECT * FROM category order by id desc');
                 $countcategories=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countcategories ?></h2>
                     <span> <a href="index.php">Available Categories</a></span>
                 </div>
                 
        </div>
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM POLICY_TYPE order by id desc');
                $countpolicy_types=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countpolicy_types ?></h2>
                     <span><a href="policy_type.php">Available Policy Types</a></span>
                 </div>
        </div>
        
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM policy_tbl  WHERE policy_status =1 ');
                $countpending_policies=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countpending_policies ?></h2>
                     <span><a href="pending.php">Pending Policies</a></span>
                 </div>
        </div>
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM policy_tbl  WHERE policy_status =2 ');
                $countapproved_policies=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countapproved_policies ?></h2>
                     <span><a href="approved.php">Approved Policies</a></span>
                 </div>
        </div>
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM policy_tbl  WHERE policy_status =3 ');
                $countrejected_policies=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2><?php echo $countrejected_policies ?></h2>
                     <span><a href="rejected.php">Rejected Policies</a></span>
                 </div>
        </div>
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $num_row=mysqli_query($con,'SELECT * FROM policy_tbl  WHERE policy_status =3 ');
                $countrejected_policies=mysqli_num_rows($num_row);
                    
                  ?>
                 <div>
                     <h2>xx<?php //echo $countrejected_policies ?></h2>
                     <span>Active</span>
                 </div>
        </div>
        
        
        
    </div>
</section>

<!-- <div class="interface">  -->

    
     <div class="table-heads">
         <h3 class="table-title">Categories</h3>
         <h4 class="table-link"><a href="add_category.php">Add Category</a></h4>
     </div>
     

                    <div class="table-stats">    
                        <?php require 'includes/search_form.php'; ?> 

                          <table width="100%">
                                <thead>
                                    <tr>
                                            <th width="10%" class="serial">#SNO</th>
                                            <th width="10%" class="jonah">ID</th>
                                            <th width="30%">Category Name</th>
                                            <th width="50%">Action</th>

                                    </tr>
                                    <?php  
                                        //search functionality
                                        if (isset($_POST['search']) && !empty($_POST['search'])) {
                                            $res=mysqli_query($con,"SELECT * FROM category where category LIKE '%$_POST[search]%' ");
                                            $count=mysqli_num_rows($res);
                                            if ($count== 0 && !empty($_POST['search'])) {?>
                                                
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo "No Matching Results";   ?></td>
                                                        </tr>
                                                        </tbody> 
                                                            
                                                <?php } } //end of search functionality ?>
                               
                                </thead>
                                <tbody>
                                    <?php 
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) {
                                       
                                     ?>   
                                       
                                        <tr>
                                            <td><?php echo $i;  ?></td>
                                            <td><?php echo $row['id'];  ?></td>
                                            <td><?php echo $row['category'];  ?></td>
                                            <td>
                                                <a class="editbtn" href="add_category.php?id=<?php echo $row['id'];  ?> "> Edit</a> 
                                                <a class="deletebtn" href="index.php?id=<?php echo $row['id'];  ?> &type=delete">Delete</a></td>
                                        </tr>
                                        <?php
                                     $i++; }?>
                                       
                                   <!-- 
                                    <tr>
                                        <td width="5%"><?php //echo $i;  ?></td>
                                        <td width="5%"><?php //echo $row['id'];  ?></td>
                                        <td width="70%"><?php // echo $row['department'];  ?></td>
                                        <td><a href="">Edit</a> <a href="index.php?id=<?php //echo $row['id']; ?>&type=delete"></a> </td>
                                        <td><a href="">Delete</a> <a href="index.php?id=<?php //echo $row['id']; ?>"></a> </td>
                                    
                                        <td class="serial">3.</td>
                                        <td class="jonah">Upload image</td>
                                        <td>#555666</td>
                                        <td class="name">Jonah Kiplimo</td>
                                        <td class="product">Imax</td>
                                        <td class="badge badge-complete">Complete</td>
                                    </tr>
                                    -->
                                    
                                </tbody>
                          </table>
                      
                    </div>
                
            
        
    
<!--  </div>-->


<?php
require('includes/footer.inc.php')
?>
