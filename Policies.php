<?php 

class Policies
{
    
    public function deletePolicyHistory(){
        require 'db.inc.php';
        $sql=mysqli_query($con,"delete from policy_tbl where  '$_SESSION[USER_ID]' =16 ");
        
        return $sql;
        

        //echo 'method tested';

    }
}




?>