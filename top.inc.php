<?php
session_start();
$page_title="Insurance Sys";
require 'db.inc.php';

if (!isset($_SESSION['ROLE'])) {
   header('location:home.php');
   die();
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title;  ?></title>
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">

    
    <style>
          .welcome{
            color: cadetblue;
            font-size: 20  px;
        }   
            

    </style>
</head>
<body>
   <div class="main-container">
      
<section class="interface">

    <div class="navigation">
        <div class="top_navigation">
            <div>
                <img src="icons/menu.jpg" alt="" style="width:30px; height:30px; ">
            </div>
                <form action="" method="post">
                <div class="search">
                    <img class="img" src="icons/searchicon.png" alt="">
                    <input type="text" name="search" placeholder="Search Here">
                    <input type="submit"    value="Submit" style="cursor:pointer">
                </div>
                </form>
        </div>
        <div class="profile">
            <ul>
                <li>
                    <h2 class="welcome">Welcome <?php echo $_SESSION['USERNAME'].'' ?></h2>
                        <!--<h3><?php echo $_SESSION['ROLE'] ?></h3>-->
                    </li>
                    <li> 
                        <a href="logout.php" class="logout">
                            <img src="icons/logout.jpg" alt="" style="width: 30px; height:30px; border-radius:50%;">Logout
                        </a>
                        <a href="resetpassword.php" >
                            <img src="icons/resetpass.png" alt="" style="width: 20px; height:20px; margin-right:10px;"> Reset Pass
                        </a>
                    </li>
             </ul>
         </div>
    </div>


</section>



<section id="menu" class="menu">
    <div class="logo">
        <img src="" alt="">
        <h2>IMS Sys</h2>
    </div>
    <div class="items">
        <li class="menu-title">Menu</li>

                <?php  if ($_SESSION['ROLE']==1) { ?>
                <li class="menu-item-dropdown">
                    <a href="index.php">Categories</a>
                </li>
                <li class="menu-item-dropdown">
                    <a href="policy_type.php">Policy Type</a>
                </li>

                <li class="menu-item-dropdown">
                    <a href="user.php">User(s)</a>
                </li>
                
                <li class="menu-item-dropdown">
                    <a href="policy.php">Manage Policy</a>
                </li>
                <li class="menu-item-dropdown">
                    <a href="policy_history.php">Policy Application History</a>
                </li>

                <?php }else {  ?>
                 <li class="menu-item-dropdown">
                    <a href="add_user.php?id=<?php  echo $_SESSION['USER_ID'] ?>">Profile</a>
                </li>

                <li class="menu-item-dropdown">
                    <a href="policy.php?id=<?php echo $_SESSION['USER_ID'] ?>">Policy</a>
                </li>

                <li class="menu-item-dropdown">
                    <a href="policy_history.php?id=<?php echo $_SESSION['USER_ID'] ?>">History</a>
                </li>
               <?php  }  ?>

    </div>
</section>


   </div>

