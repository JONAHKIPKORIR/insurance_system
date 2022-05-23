
<?php

require('top.inc.php');
$firstname='';

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
    $sql="SELECT policy_tbl.*, users.firstname,users.lastname,policy_type.policy_type,users.id as eid FROM policy_tbl,policy_type, users where policy_tbl.policy_status=1 and policy_tbl.user_id=users.id and policy_tbl.policy_type=policy_type.id  order by policy_tbl.id desc";
    //$sql="SELECT * FROM policy_tbl order by id desc";
}else {
    $eid=$_SESSION['USER_ID'];
    $sql="SELECT policy_tbl.*, users.firstname,users.lastname,policy_type.policy_type,users.id as eid FROM policy_tbl,policy_type, users where policy_tbl.user_id='$eid' and policy_tbl.policy_status=1  and policy_tbl.user_id=users.id and policy_tbl.policy_type=policy_type.id order by policy_tbl.id desc";
}
$res=mysqli_query($con,$sql);


?>

<link rel="stylesheet" type="text/css" href="style.css">
<style>
    
.box-content{
    cursor: pointer;
}
        
</style>

            
                <div class="table-heads">
                        <h3 class="table-title">Pending Policies</h3>
                        <h4 class="table-link"><a href="add_policy.php">Apply New Policy</a></h4>
                </div>

                <div class="table-stats">
                    <table class="table">
                                <thead>
                                    <tr>
                                            <th width="5%">#SNO</th>
                                            <th width="5%">ID </th>
                                            <th width="10%">User Name(user_isd)<!--Insu Category Name(cat_id)--></th>
                                            <th width="10%">Last Name</th>
                                            <th width="10%">Policy Name(policy_id)</th>
                                            <th width="15%">Sum Assured</th>
                                            <th width="15%">Premium</th>
                                            <th width="15%">Tenure</th>
                                            <th width="15%">Created_Date</th>
                                            <th width="20%">Status</th>
                                            <th width="10%">Action</th>

                                    </tr>
                               
                                </thead>
                                <tbody>
                                    <?php 
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) {
                                       
                                     ?>   
                                       
                                        <tr>
                                            <td><?php echo $i  ?></td>
                                            <td><?php echo $row['id']  ?></td>
                                            <td><?php echo $row['firstname'] . '('.$row['eid'].')' ?></td>
                                            <td><?php echo $row['lastname']  ?></td>
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
