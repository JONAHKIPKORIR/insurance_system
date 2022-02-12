<?php

require('top.inc.php');
if ($_SESSION['ROLE'] !=1) {
    header('location:add_user.php?id='.$_SESSION['USER_ID']);
    die();
}
if (isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);

    $res=mysqli_query($con,"delete from policy_type where id='$id'");
    header('policy_type.php');

    
}


//to select dat from db
$res=mysqli_query($con,'SELECT * FROM policy_type order by id desc');
?>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    .table-stats {
                width: calc(100% - 300px );
                margin-left: 300px;
                overflow: auto;
                
                padding: 10px;
                border-radius: 10px;
                
            }
</style>
<section class="boxes">
    <div class="box">
        <div class="box-content">
             <img class="img"  src="images/me.png" alt="" >
             <?php
             //to select dat from db
                $res=mysqli_query($con,'SELECT * FROM POLICY_TYPE order by id desc');
                $countpolicy_types=mysqli_num_rows($res);
                    
                  ?>
                 <div>
                     <h2><?php echo $countpolicy_types ?></h2>
                    <span> View Policy Types</span>
                 </div>
        </div>
    </div>
</section>

                    <div class="table-heads">
                        <h3 class="table-title">Policy Type </h3>
                        <h4 class="table-link"><a href="add_policy_type.php">Add Policy Type</a></h4>
                    </div>

                    <?php require 'includes/search_form.php';  ?>
                      <div class="table-stats">
                     
                          <table class="table">
                                <thead>
                                    <tr>
                                            <th width="20%">#SNO</th>
                                            <th width="20%" >ID</th>
                                            <th width="20%">Policy Type Name</th>
                                            <th width="20%">Action</th>

                                    </tr>
                                    <?php
                                    //search functionality
                                    if (isset($_POST['search']) && !empty($_POST['search'])) {
                                        $res=mysqli_query($con,"SELECT * FROM policy_type where policy_type LIKE '%$_POST[search]%' ");
                                        $count=mysqli_num_rows($res);
                                        if ($count== 0 && !empty($_POST['search'])) {?>
                                            
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo "No Matching Results";   ?></td>
                                                    </tr>
                                                    </tbody> 
                                                        
                                            <?php } }  
                                    
                                    ?>
                                </thead>
                                <tbody>
                                    <?php 
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) {
                                       
                                     ?>   
                                       
                                        <tr>
                                            <td><?php echo $i;  ?></td>
                                            <td><?php echo $row['id'];  ?></td>
                                            <td><?php echo $row['policy_type'];  ?></td>
                                            <td>
                                                <a class="editbtn" href="add_policy_type.php?id=<?php echo $row['id'];  ?> "> Edit</a> </td>
                                               <td> <a class="deletebtn" href="policy_type.php?id=<?php echo $row['id'];  ?> &type=delete">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                     $i++; }?>
                                       
                                  
                                    
                                </tbody>
                          </table>
                      </div>
                    
                


<?php
require('includes/footer.inc.php');
?>