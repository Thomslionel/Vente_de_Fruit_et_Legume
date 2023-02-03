<?php
$dbname="sitemarchant";
$username="dbauser";
$password="mw0CVO-zTpJGTXMG";
$servername="localhost";

//test du contenu
    $conn=mysqli_connect($servername,$username,$password,$dbname);
//check connection
            if(!$conn)
            {

                die("connection failed" .mysqli_connect_error());

                
            }
?>