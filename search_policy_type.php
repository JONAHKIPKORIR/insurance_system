<?php
require 'top.inc.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Policy Type</title>
</head>
<body> 
    
  </form>
  <div class="table-heads">
                        <h3 class="table-title">Policy Type </h3>
                        <h4 class="table-link"><a href="add_policy_type.php">Add Policy Type</a></h4>
                    </div>

                    
                      <div class="table-stats">
                          <table class="table" width="100%">
                                <thead>
                                    <tr>
                                            <th width="20%" class="serial">#SNO</th>
                                            <th width="20%" class="jonah">ID</th>
                                            <th width="40%">Policy Type Name</th>
                                            <th width="20%">Action</th>

                                    </tr>
                               
                                </thead>
    <?php  
     //if (isset($_POST['search']) && !empty($_POST['search'])) {
        $res=mysqli_query($con,"SELECT * FROM policy_type where policy_type LIKE '%$_POST[search]%' OR id LIKE '$_POST[search]' ");
         $count=mysqli_num_rows($res);
           if ($count== 0 && !empty($_POST['search'])) {?>
             
                   <tbody>
                   <td><?php echo "No Matching Results";   ?></td>
                     </tbody> 
                          
              <?php } 
                else {
                    $i=1;
                     while ($row=mysqli_fetch_assoc($res)) { ?>   
                                <tbody>
                                        <tr>
                                            <td><?php $i; ?></td>
                                            <td><?php echo $row['id'];  ?></td>
                                            <td><?php echo $row['policy_type'];  ?></td>
                                            <td>
                                                <a class="editbtn" href="add_policy_type.php?id=<?php echo $row['id'];  ?> "> Edit</a> 
                                                <a class="deletebtn" href="policy_type.php?id=<?php echo $row['id'];  ?> &type=delete">Delete</a></td>
                                        </tr>
                                      
                                        <?php
                                     $i++; }
                }
           // }
           ?>
            
                </tbody>
            </table>
    
            </div>
        
                   
    
</body>
</html>
