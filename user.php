<?php

require('top.inc.php');
if ($_SESSION['ROLE'] !=1) {
    header('location:add_user.php?id='.$_SESSION['USER_ID']);
    die();
}
if (isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);

    $res=mysqli_query($con,"delete from users where id='$id'");
    header('user.php');

      
}


//to select dat from db
$res=mysqli_query($con,'SELECT * FROM users where  role=2 order by id desc');
?>

<link rel="stylesheet" type="text/css" href="style.css">

                
                    <div class="table-heads">
                        <h3 class="table-title">User(s)</h3>
                        <h4 class="table-link"><a href="add_user.php">Add User</a></h4>
                    </div>

                    <div class="table-stats">
                        <?php require 'includes/search_form.php'; ?>
                          <table class="table">
                                <thead>
                                    <tr>
                                            <th width="5%" class="serial">#SNO</th>
                                            <th width="5%" class="jonah">ID</th>

                                            <th width="10%">First Name</th>
                                            <th width="10%">Last Name</th>
                                            <th width="10%">Email</th>
                                            <th width="10%">Mobile</th>
                                            <th width="30%">Action</th>

                                    </tr>
                                    <?php
                                         //search functionality
                                         if (isset($_POST['search']) && !empty($_POST['search'])) {
                                            $res=mysqli_query($con,"SELECT * FROM users where CONCAT(name,email) LIKE '%$_POST[search]%' ");
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
                                            <td ><?php echo $i;  ?></td>
                                            <td ><?php echo $row['id'];  ?></td>
                                            
                                            <td><?php echo $row['firstname'];  ?></td>
                                            <td><?php echo $row['lastname'];  ?></td>
                                            <td><?php echo $row['email'];  ?></td>
                                            <td><?php echo $row['mobile'];  ?></td>
                                            <td>
                                                <a class="editbtn" href="view_single_user.php?id=<?php echo $row['id'];  ?> "> View</a>
                                                <a class="editbtn" href="add_user.php?id=<?php echo $row['id'];  ?> "> Edit</a> 
                                                <a class="deletebtn" href="user.php?id=<?php echo $row['id'];  ?> &type=delete" onclick="return confirm('Are you sure to delete?')" >Delete</a></td>
                                        </tr>
                                        <?php
                                     $i++; }?>
                                       
                                   <!-- <tr>
                                        <td width="5%"><?php //echo $i;  ?></td>
                                        <td width="5%"><?php //echo $row['id'];  ?></td>
                                        <td width="70%"><?php // echo $row['department'];  ?></td>
                                        <td><a href="">Edit</a> <a href="index.php?id=<?php //echo $row['id']; ?>&type=delete"></a> </td>
                                        <td><a href="">Delete</a> <a href="index.php?id=<?php //echo $row['id']; ?>"></a> </td>
                                    
                                        <td class="serial">1.</td>
                                        <td class="jonah">Upload image</td>
                                        <td>#555666</td>
                                        <td class="name">Jonah Kiplimo</td>
                                        <td class="product">Imax</td>
                                        <td class="badge badge-complete">Complete</td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><?php //echo $i;  ?></td>
                                        <td width="5%"><?php //echo $row['id'];  ?></td>
                                        <td width="70%"><?php // echo $row['department'];  ?></td>
                                        <td><a href="">Edit</a> <a href="index.php?id=<?php //echo $row['id']; ?>&type=delete"></a> </td>
                                        <td><a href="">Delete</a> <a href="index.php?id=<?php //echo $row['id']; ?>"></a> </td>
                                    
                                        <td class="serial">2.</td>
                                        <td class="jonah">Upload image</td>
                                        <td>#555666</td>
                                        <td class="name">Jonah Kiplimo</td>
                                        <td class="product">Imax</td>
                                        <td class="badge badge-pending">Pending</td>
                                    </tr>
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
            


<?php
require('includes/footer.inc.php')
?>