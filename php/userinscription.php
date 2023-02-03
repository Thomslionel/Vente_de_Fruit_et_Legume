<?php
include 'login.php';

if(isset($_SESSION['idpersonne']))
{
    $userid=$_SESSION['idpersonne'];
}else
{
    $userid='';
}


if(isset($_POST['heart']))
{
    
    if($userid =='')
    {
        header('Location:userlogin.php');
    }
    else
    {
        $id=$_POST['idmarchandise'];
        $sql="SELECT * FROM likes WHERE (idpersonne = '$userid' AND idmarchandise='$id')";

        $cn= mysqli_query($conn,$sql);

        if(mysqli_num_rows($cn)>0)
        {
            $mess="Produit déjà aimé";
        }else
        {
            $req="INSERT INTO likes (idpersonne,idmarchandise) VALUES ('$userid','$id')";
            $cnn= mysqli_query($conn,$req);
        }
    }
}





if(isset($_POST['panier']))
{
    
    if($userid =='')
    {
        header('Location: userlogin.php');
    }
    else
    {
        $id=$_POST['idmarchandisecart'];
        $sql="SELECT * FROM chariot WHERE (idpersonne = '$userid' AND idmarchandise='$id')";

        $cn= mysqli_query($conn,$sql);

        if(mysqli_num_rows($cn)>0)
        {
            $mess="Produit déjà ajouté au Panier";
        }else
        {
            $req="INSERT INTO chariot (idpersonne,idmarchandise) VALUES ('$userid','$id')";
            $cnn= mysqli_query($conn,$req);
        }
    }
}

?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Fruits et Légumes
        </title>
        <link rel="stylesheet" href="../style/userstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    </head>

    <body>
        <header>
            <p><a href="index.php"><span class="tete">Khrono</span>Fruits</a> </p>
            <nav class="navbar">
                    <ul>
                         <li><a href="#">Acceuil</a>  
                           
                        </li>
                            
                            <li> <a href="#">Produits</a> 
                                    <ul>
                                            <li><a href="fruit.php">Frtuits</a> </li>
                                            <li><a href="legumes.php">Legumes</a></li>
                                    </ul>
                            </li>
                     </ul>
            </nav>  
            
            
            <div class="icons">



                 <?php
                        include 'login.php';

                        $nbrelike="SELECT * FROM likes WHERE idpersonne = '$userid' ";
                    

                        $resulike=mysqli_query($conn,$nbrelike);
                        

                        $nbrelikes=mysqli_num_rows($resulike);


                        $nbrecommande="SELECT * FROM chariot WHERE idpersonne = '$userid'";

                        $resulcommande=mysqli_query($conn,$nbrecommande);


                        $resulcommandes=mysqli_num_rows($resulcommande);
                     ?>
        
                <a href="#"><i class="fa fa-search"></i></a>
                <a href="userlogin.php"><i class="fa fa-heart"><span>(<?=$nbrelikes;?>)</span></i></a>
                <a href="userlogin.php"><i class="fa fa-shopping-cart"><span>(<?=$resulcommandes;?>)</span></i></a>
                </div>
              
        </header>


        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="../image/image1.png" alt="" height=100%></div>
                <div class="slide"><img src="../image/slide2.jpeg" alt=""></div>
                <div class="slide"><img src="../image/slide4.jpeg" alt=""></div>
                <div class="slide"><img src="../image/slide1.jpeg" alt=""></div>
            </div>
        </div>

        <!--
        <div class="vertical">
            <p><span>Nos</span>Produits</p>
            <nav class="bar">
                    <ul>
                            <li> <a href="#">Legumes</a> 
                                    <ul>
                                            <li><a href="#">Tomate</a> </li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                    </ul>
                            </li>

                            <li><a href="#">Fruits</a>
                            
                                <ul>
                                        <li><a href="#">Orange</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                </ul>
                             </li>
                     </ul>
            </nav>    
        </div>-->


























   



    <div class="center">
                <h1>Login</h1>
                <form method="post" action="usertraitement.php">
                    <div class="txt_field">
                    <input type="text" name="nomuser" required >
                    <span></span>
                    <label>Nom</label>
                    </div>
                    <div class="txt_field">
                    <input type="text"  name="prenomuser" required  >
                    <span></span>
                    <label>Prenom</label>
                    </div>
                    <div class="txt_field">
                    <input type="text"   name="usernameuser" required >
                    <span></span>
                    <label>Username</label>
                    </div>
                    <div class="txt_field">
                    <input type="password"  name="passworduser" required  >
                    <span></span>
                    <label>Password</label>
                    </div>
                    <input type="submit" name="enregistrer" value="S'enregistrer">
                </form>
    </div>











    <footer class="footer">

    <section class="grid">

   <div class="box">
      <h3>quick links</h3>
      <a href="#"> <i class="fas fa-angle-right"></i> Acceuil</a>
      <a href="#"> <i class="fas fa-angle-right"></i>Produits</a>
      <a href="#"> <i class="fas fa-angle-right"></i> Recettes</a>
      <a href="#"> <i class="fas fa-angle-right"></i> A propos de nous</a>
   </div>

   <div class="box">
      <h3>extra links</h3>
      <a href="#"> <i class="fas fa-angle-right"></i> Se connecter</a>
      <a href="#"> <i class="fas fa-angle-right"></i> Se deconnerter</a>
      <a href="#"> <i class="fas fa-angle-right"></i> Commandes</a>
      <a href="~#"> <i class="fas fa-angle-right"></i> Souhaits</a>
   </div>

   <div class="box">
      <h3>contact us</h3>
      <a href="#"><i class="fas fa-phone"></i> +226 XX XX XX XX</a>
      <a href="#"><i class="fas fa-phone"></i> +226 XX XX XX XX</a>
      <a href="mailto:thomsmanly@gmail.com"><i class="fas fa-envelope"></i> XXXX@gmail.com</a>
      <a href="#"><i class="fas fa-map-marker-alt"></i> Ouagadougou, saaba </a>
   </div>

   <div class="box">
      <h3>follow us</h3>
      <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
      <a href="#"><i class="fab fa-twitter"></i>twitter</a>
      <a href="#"><i class="fab fa-instagram"></i>instagram</a>
      <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
   </div>

</section>

<div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>Binome 9</span> | all rights reserved!</div>

</footer>

    

 
    </body>


</html>