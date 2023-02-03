<?php
session_start();
if(isset($_SESSION['idpersonne']))
{
    $deleteid=$_SESSION['idpersonne'];
    include "login.php";
    $delesqlcx="DELETE FROM chariot Where idpersonne ='$deleteid'";
    $testcx =mysqli_query($conn,$delesqlcx);
    $delesqlc="DELETE FROM likes Where idpersonne ='$deleteid'";
    $testc =mysqli_query($conn,$delesqlc);
    header("Location:../index.php");
    

session_unset();
session_destroy();



}





?>
