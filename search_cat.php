<?php
require 'top.inc.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body> 
    
  </form>
    <div class="table-stats">               
                          <table width="100%">
                                <thead>
                                    <tr>
                                    <th width="10%" class="serial">#SNO</th>
                                            <th width="10%" class="jonah">ID</th>
                                            <th width="60%">Category Name</th>
                                            <th width="20%">Action</th>

                                    </tr>
                               
                                </thead>
    <?php  
     if (isset($_POST['search']) && !empty($_POST['search'])) {
        $res=mysqli_query($con,"SELECT * FROM category where category LIKE '%$_POST[search]%' ");
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
                                            <td><?php echo $row['category'];  ?></td>
                                            <td>
                                                <a class="editbtn" href="add_category.php?id=<?php echo $row['id'];  ?> "> Edit</a> 
                                                <a class="deletebtn" href="index.php?id=<?php echo $row['id'];  ?> &type=delete">Delete</a></td>
                                        </tr>
                                      
                                        <?php
                                     $i++; }
                }
            }?>
            
                </tbody>
            </table>
    
            </div>
        
                   
    
</body>
</html>
