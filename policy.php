
<?php

require('top.inc.php');
$firstname='';
require 'db.inc.php';
require 'Policies.php';

$pObject=new Policies();
$pObject->deletePolicyHistory(); 
                              


if (isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $res=mysqli_query($con,"delete from policy_tbl where id='$id'");
    header('policy.php');  
}
if (isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $status=mysqli_real_escape_string($con,$_GET['status']);
    $res=mysqli_query($con,"update policy_tbl set policy_status='$status' where id='$id'");
    
    header('policy.php');  
}


//to select dat from db
if ($_SESSION['ROLE']==1) {
    $sql="SELECT policy_tbl.*, users.firstname,category.id,category.category,policy_type.policy_type,users.id  FROM policy_tbl,category,policy_type, users where  policy_tbl.user_id=users.id and policy_tbl.policy_type=policy_type.id  and policy_tbl.category_id=category.id and policy_tbl.policy_status in(1,2,3) order by policy_tbl.id desc";
    //$sql="SELECT * FROM policy_tbl order by id desc";
}else {
    $eid=$_SESSION['USER_ID'];
    $sql="SELECT policy_tbl.*, users.firstname,category.id,category.category,policy_type.policy_type,users.id  FROM policy_tbl,category,policy_type, users where ( policy_tbl.user_id=$eid )   and policy_tbl.user_id=users.id and policy_tbl.policy_type=policy_type.id and policy_tbl.category_id=category.id  order by policy_tbl.id desc";
}
$res=mysqli_query($con,$sql);


?>

<link rel="stylesheet" type="text/css" href="style.css">
<style>
    
.box-content{
    cursor: pointer;
}
        
</style>
<section class="boxes">
    <div class="box">
        <div class="box-content" style=""> 
            
             <img  class="img" src="images/me.png" alt="" >
             <?php
             //to select dat from db where policy_status is pending
                if ($_SESSION['ROLE']==1) {
                    $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id  FROM policy_tbl,users  WHERE  policy_status =1 AND policy_tbl.user_id=users.id");
                    $countpending_policies=mysqli_num_rows($num_rows);
                }
                if($_SESSION['ROLE']!=1) {
                    $eid=$_SESSION['USER_ID'];
                    $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id as eid FROM policy_tbl,users  WHERE  policy_status =1 AND policy_tbl.user_id='$eid' AND policy_tbl.user_id=users.id");
                    $countpending_policies=mysqli_num_rows($num_rows);
                }
                   
                  ?>
                 <div>
                    <a href="pending.php?id=<?php echo $_SESSION['USER_ID'];   ?>"> 
                        <h2><?php echo $countpending_policies ?></h2>
                        <span> Pending Policies </span>
                    </a>
                 </div>
        </div>
        <div class="box-content">
             <img  class="img" src="images/me.png" alt="" >
             <?php
             if ($_SESSION['ROLE']==1) {
                $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id  FROM policy_tbl,users  WHERE  policy_status =2 AND policy_tbl.user_id=users.id");
                $countapproved_policies=mysqli_num_rows($num_rows);
                 
             }if($_SESSION['ROLE']!=1) {
                 //to select dat from db where policies are approved
                  $eid=$_SESSION['USER_ID'];
                    $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id as eid FROM POLICY_TBL,users WHERE policy_status=2 and policy_tbl.user_id='$eid' and policy_tbl.user_id=users.id ");
                    //$r=mysqli_query($con,'SELECT policy_tbl.*,category.category,users.firstname FROM policy_tbl,category,users  WHERE policy_tbl.user_id=users.id and policy_tbl.category_id=category.id and policy_status =2 ');
                    $countapproved_policies=mysqli_num_rows($num_rows);
             }          
                  ?>
                 <div>
                    <a href="approved.php?id=<?php echo $_SESSION['USER_ID'];   ?>">
                        <h2><?php  echo $countapproved_policies ?></h2>
                        <span> Approved Policies</span>
                    </a>
                 </div>
        </div>
        <div class="box-content">
             <img  class="img" src="images/me.png" alt="" >
             <?php
             if ($_SESSION['ROLE']==1) {
                $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id  FROM policy_tbl,users  WHERE  policy_status =3 AND policy_tbl.user_id=users.id");
                $countrejected_policies=mysqli_num_rows($num_rows);          
             }if($_SESSION['ROLE']!=1) {
                 //to selecting rejected policies based on a specific user who applied
                 $eid=$_SESSION['USER_ID'];
                 $num_rows=mysqli_query($con,"SELECT policy_tbl.*,users.id as eid FROM POLICY_TBL,users WHERE policy_status=3 and policy_tbl.user_id='$eid' and policy_tbl.user_id=users.id ");
                $countrejected_policies=mysqli_num_rows($num_rows);
                 
             }
                 
                  ?>
                 <div>
                     <a href="rejected.php?id=<?php echo $_SESSION['USER_ID'];   ?>">  
                        <h2><?php  echo $countrejected_policies ?></h2>
                        <span>Rejected Policies</span>
                     </a>
                 </div>
        </div>
    </div>

</section>
            
                <div class="table-heads">
                        <h3 class="table-title">Policy Applied By User</h3>
                        <h4 class="table-link">
                            <a href="Policy.php">Clear Policies </a>
                        </h4>
                        
                        <h4 class="table-link"><a href="add_policy.php">Apply New Policy</a></h4>
                </div>

                <div class="table-stats">
                    <?php require 'includes/search_form.php'; ?>
                    <table class="table">
                                <thead>
                                    <tr>
                                            <th width="5%">#SNO</th>
                                            <th width="5%">ID </th>
                                            <th width="15%">User Name(user_isd)<!--Insu Category Name(cat_id)--></th>
                                            <th width="15%">Category Name</th>
                                            <th width="10%">Policy Name(policy_id)</th>
                                            <th width="15%">Sum Assured</th>
                                            <th width="15%">Premium</th>
                                            <th width="15%">Tenure</th>
                                            <th width="15%">Created_Date</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Action</th>

                                    </tr>
                                    <?php
                                         //search functionality
                                         if (isset($_POST['search']) && !empty($_POST['search'])) {
                                             $eid=$_SESSION['USER_ID'];
                                            $res=mysqli_query($con,"SELECT policy_tbl.*,users.id,users.firstname,category.category  FROM policy_tbl,users,category,policy_type  WHERE policy_tbl.user_id=$eid and CONCAT(policy_tbl.id, policy_tbl.policy_type,policy_tbl.category_id, policy_tbl.policy_type,users.firstname)  LIKE '%$_POST[search]%'  ");
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
                                            <td><?php echo $i  ?></td>
                                            <td><?php echo $row['id']  ?></td>
                                            <td><?php echo $row['firstname'] //. '('.$_row['USER_ID'].')' ?></td>
                                            <td><?php echo $row['category'] ?></td>
                                            <td><?php echo $row['policy_type']  ?></td>
                                            <td><?php echo $row['sum_assured']  ?></td>
                                            
                                            <td><?php echo $row['premium'] ?></td>
                                            <td><?php echo $row['tenure'] ?></td>
                                            <td><?php echo $row['created_date'] ?></td>
                                            
                                            <td>
                                                <?php 
                                                if ($row['policy_status']==1) {
                                                    echo "Pending";
                                                }
                                                if ($row['policy_status']==2) {
                                                    echo "Approved";
                                                }
                                                if ($row['policy_status']==3) {
                                                    echo "Rejected";
                                                }
                                                  if ($_SESSION['ROLE']==1) { ?>
                                                      <select name="" id="" class="form-control" onchange="update_policy_status('<?php echo $row['id']  ?>', this.options[this.selectedIndex].value)">
                                                          <option value="">Update status</option>
                                                          <option style="color: green;" value="2">Approve</option>
                                                          <option value="3">Reject</option>
                                                      </select>
                                                  <?php } ?>
                                            </td>
                                            <?php if ($_SESSION['ROLE']==1) {   ?>
                                                <td><a class="deletebtn" id="delete" href="policy.php?id=<?php echo $row['id']  ?> &type=delete">Delete</a></td>
                                           <?php }  ?>
                                           
                                        </tr>
                                        <?php
                                     $i++; }?>
                                       
                                   
                                </tbody>
                          </table>
                  </div>
             
            <!-- </div>   -->
           
<script>
    function update_policy_status(id,select_value) {
        alert(window.location.href='policy.php?id=' +id+'&type=update&status='+select_value);
    }
</script>

<?php
require('includes/footer.inc.php')
?>
