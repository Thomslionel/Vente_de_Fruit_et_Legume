<?php
session_start();
include "login.php";
if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{
   if(isset($_POST['add_product']))
   {

        $name=$_POST['name'];
        $ingredient1=$_POST['ingredient1'];
        $ingredient2=$_POST['ingredient2'];
        $ingredient3=$_POST['ingredient3'];
        $details=$_POST['details'];

        $image=$_FILES['image']['name'];
       
        $image=filter_var($image,FILTER_SANITIZE_STRING);
        $imagesize=$_FILES['image']['size'];
        $imagestmp=$_FILES['image']['tmp_name'];
        $imagefolder='../image/'.$image;



        $sql = "SELECT * FROM recette WHERE nom='$name'";
        $result =mysqli_query($conn,$sql);

     
        if(mysqli_num_rows($result)> 0){
                    
                    $message= 'Ce produit existe déjà';

        }else
            {
                if($imagesize>20000000)
                {
                    $message="image trop large";
                }else{
                    move_uploaded_file($imagestmp,$imagefolder);
                    $requete ="INSERT INTO recette (nom,ingredient1,ingredient2,ingredient3,images,details) VALUES ('$name','$ingredient1','$ingredient2','$ingredient3','$image','$details')";
                    include "login.php";
                    $result =mysqli_query($conn,$requete);
                    $message= "recette Ajouté";
                    header("Location:recette.php");

                }
            }


    }else
        {
            header("Location:pageloog.php");
        }
}
else
{
    header("Location:pageloog.php");
}