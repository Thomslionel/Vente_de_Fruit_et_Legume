<?php
session_start();
include "login.php";
if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{
   if(isset($_POST['add_product']))
   {

        $name=$_POST['name'];
        $prix=$_POST['price'];
        $details=$_POST['details'];
        $genre=$_POST['genre'];
        $typemarchand = $_POST['typemarchand'];

        $image=$_FILES['image']['name'];
       
        $image=filter_var($image,FILTER_SANITIZE_STRING);
        $imagesize=$_FILES['image']['size'];
        $imagestmp=$_FILES['image']['tmp_name'];
        $imagefolder='../image/'.$image;



        $sql = "SELECT * FROM marchandise WHERE nom='$name'";
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
                    $requete ="INSERT INTO marchandise (nom,prixKg,genre,codetypemarchandise,images,details) VALUES ('$name',$prix,'$genre','$typemarchand','$image','$details')";
                    include "login.php";
                    $result =mysqli_query($conn,$requete);
                    $message= "Produit Ajouté";
                    header("Location:produits.php");

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