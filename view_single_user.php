

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
if (isset($_GET['id'])) {
    $id=mysqli_real_escape_string($con,$_GET['id']);

    $res=mysqli_query($con,"SELECT id,name,email,mobile FROM USERS WHERE id='$id'");
}
//OR  JUST WRITE THE FOLLOWING CODE    $res=mysqli_query($con,"SELECT * FROM USERS WHERE id='$_GET[id]' ");

?>
<style>
   @media print {

       h4{
        background:rgb(88, 79, 79);
       }
       h3{
           display: none;
       }
       #menu{
           display: none;
       }
       .table-link{
           display: none;
       }
       .interface {
           
            display: none;
        }
       .table-heads .table-link a{
           display: none;
       }
       .table-stats {
            width: calc(100% - 900px );  
            margin-left: 100px;
            overflow: auto;
            padding: 10px;
            border-radius: 10px;
        }
       footer{
           display: none;
       }
    }
    @page {
        margin: 0;
    }
</style>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="print.css" media="print">

                
                    <div class="table-heads">
                        <h3 class="table-title">User(s)</h3>
                        <h4 class="table-link"><a href="add_user.php">Add User</a></h4>
                    </div>

                    <div class="table-stats">
                          <table class="table">
                                <thead>
                                    <tr>
                                            <th width="5%" class="serial">#SNO</th>
                                            <th width="5%" class="jonah">ID</th>
                                            <th width="20%">Name</th>
                                            <th width="15%">Email</th>
                                            <th width="15%">Mobile</th>
                                            <th width="40%">Action</th>

                                    </tr>
                              
                                </thead>
                                <tbody>
                                    <?php 
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($res)) {
                                       
                                     ?>   
                                       
                                        <tr>
                                            <td ><?php echo $i;  ?></td>
                                            <td >id<?php echo $row['id'];  ?></td>
                                            <td>test<?php echo $row['name'];  ?></td>
                                            <td>test<?php echo $row['email'];  ?></td>
                                            <td><?php echo $row['mobile'];  ?></td>
                                            <td>
                                                <a class="editbtn" id="printButton" href="add_user.php?id=<?php echo $row['id'];  ?> " target="_blank" onclick="printForm()" media="print" > Print</a>
                                               
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
            

                       <script type="text/javascript">
                                function printForm(){
                                    window.print();
                                }
                        </script>

<?php
require('footer.inc.php')
?>