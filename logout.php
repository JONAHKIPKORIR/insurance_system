

<?php
session_start();

       unset($_SESSION['ROLE']);
        unset($_SESSION['USERNAME']);
        unset($_SESSION['USER_ID']);
        header('location:home.php');
        die();

?>