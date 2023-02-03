<?php

session_start();
include 'login.php';

if(isset($_SESSION['idpersonne']))
{
    $user_id= $_SESSION['idpersonne'];

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
                         <li><a href="../index.php">Acceuil</a>  
                           
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

                        $nbrelike="SELECT * FROM likes WHERE idpersonne = '$user_id' ";
                    

                        $resulike=mysqli_query($conn,$nbrelike);
                        

                        $nbrelikes=mysqli_num_rows($resulike);


                        $nbrecommande="SELECT * FROM chariot WHERE idpersonne = '$user_id'";

                        $resulcommande=mysqli_query($conn,$nbrecommande);


                        $resulcommandes=mysqli_num_rows($resulcommande);
                     ?>
        
                <a href="#"><i class="fa fa-search"></i></a>
                <a href="#"><i class="fa fa-heart"><span>(<?=$nbrelikes;?>)</span></i></a>
                <a href="#"><i class="fa fa-shopping-cart"><span>(<?=$resulcommandes;?>)</span></i></a>
                </div>
                <div class='user'>
                    <div class='btncon'><a href="userlogin.php">Se connecter</a></div>
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

       




        <div class="produit"> <p><span>Vos</span>likes</p></div>

        <section class="boxcontainerte">
                        <?php
                             include 'login.php';

                        $req="SELECT * FROM likes  WHERE idpersonne= '$user_id'";

                        $resul=mysqli_query($conn,$req);

                        if(mysqli_num_rows($resul)>0)


                        if(mysqli_num_rows($resul)>0)
                        {
                           
                            while( $row=mysqli_fetch_assoc($resul))
                            {  
                                $marchan=$row['idmarchandise'];

                                $requ="SELECT * FROM marchandise  WHERE idmarchandise= '$marchan'";

                                $result=mysqli_query($conn,$requ);
                                while($rows=mysqli_fetch_assoc($result))
                                
                                {
                               
                    ?>
                           

                            <div class="box">
                                            <div class="space">
                                                                  <button type="submit" class="fas fa-heart" name="heart"></button>
                                                </form>
                                                        <a href="#= <?=$rows['images']; ?>"><img src="../image/<?=$rows['images']; ?>" class="imagesbox" alt=""></a>   
                                                            
                                                            
                                                                    <div class="name"><?=$rows['nom']; ?></div>
                                                                    <div class="price"><?=$rows['prixKg']; ?> Fcfa/kg</div>
                                                                <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="1" okeypress="if(this.value.lenght ==2) return false;">-->
                                                            <form action="#" method="POST" >
                                                                    <input type="submit" value="Ajouter au panier" name="panier" class="btn">
                                                                    <input type="hidden" name="idmarchandisecart" value =<?=$rows['idmarchandise']; ?>> 
                                                                    
                                                            </form>

                                                            <div class="btne">
                                                                      <a href="clientaime.php?delete=<?=$row['idlike']; ?>" class="delete" onclick="return confirm('Supprimer ce Favoris ?');">Supprimer</a>
                                                      </div>
                                                </form>
                                                            
                                                                <!-- -->

                                              </div>
                            
                            </div>
                               

                          
    
                    <?php
                     
                            }
                        }
                            
                        }else
                        {
                            echo '<p class ="empty">Pas de Fruit disponible</p>';
                        }
                    ?>
         </section>


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






<?php
}else
{
    $user_id='';
    header("Location:userlogin.php");

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
                         <li><a href="../index.php">Acceuil</a>  
                           
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

                        $nbrelike="SELECT * FROM likes WHERE idpersonne = '$user_id' ";
                    

                        $resulike=mysqli_query($conn,$nbrelike);
                        

                        $nbrelikes=mysqli_num_rows($resulike);


                        $nbrecommande="SELECT * FROM chariot WHERE idpersonne = '$user_id'";

                        $resulcommande=mysqli_query($conn,$nbrecommande);


                        $resulcommandes=mysqli_num_rows($resulcommande);
                     ?>
        
                <a href="#"><i class="fa fa-search"></i></a>
                <a href="#"><i class="fa fa-heart"><span>(<?=$nbrelikes;?>)</span></i></a>
                <a href="commandeuser.php"><i class="fa fa-shopping-cart"><span>(<?=$resulcommandes;?>)</span></i></a>
                </div>
                <div class='user'>
                    <div class='btncon'><a href="deconnexionuser.php">Déconnexion</a></div>
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

       




        <div class="produit"> <p><span>Vos</span>likes</p></div>

        <section class="boxcontainerte">
                        <?php
                             include 'login.php';

                        $req="SELECT * FROM likes  WHERE idpersonne= '$user_id'";

                        $resul=mysqli_query($conn,$req);

                        if(mysqli_num_rows($resul)>0)


                        if(mysqli_num_rows($resul)>0)
                        {
                           
                            while( $row=mysqli_fetch_assoc($resul))
                            {  
                                $marchan=$row['idmarchandise'];

                                $requ="SELECT * FROM marchandise  WHERE idmarchandise= '$marchan'";

                                $result=mysqli_query($conn,$requ);
                                while($rows=mysqli_fetch_assoc($result))
                                
                                {
                               
                    ?>
                           

                            <div class="box">
                                            <div class="space">
                                                                  <button type="submit" class="fas fa-heart" name="heart"></button>
                                                </form>
                                                        <a href="#= <?=$rows['images']; ?>"><img src="../image/<?=$rows['images']; ?>" class="imagesbox" alt=""></a>   
                                                            
                                                            
                                                                    <div class="name"><?=$rows['nom']; ?></div>
                                                                    <div class="price"><?=$rows['prixKg']; ?> Fcfa/kg</div>
                                                                <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="1" okeypress="if(this.value.lenght ==2) return false;">-->
                                                            <form action="#" method="POST" >
                                                                    <input type="submit" value="Ajouter au panier" name="panier" class="btn">
                                                                    <input type="hidden" name="idmarchandisecart" value =<?=$rows['idmarchandise']; ?>> 
                                                                    
                                                            </form>

                                                            <div class="btne">
                                                                      <a href="clientaime.php?delete=<?=$row['idlike']; ?>" class="delete" onclick="return confirm('Supprimer ce Favoris ?');">Supprimer</a>
                                                      </div>
                                                </form>
                                                            
                                                                <!-- -->

                                              </div>
                            
                            </div>
                               

                          
    
                    <?php
                     
                            }
                        }
                            
                        }else
                        {
                            echo '<p class ="empty">Pas de Fruit disponible</p>';
                        }
                    ?>
         </section>


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




<?php


}



if(isset($_SESSION['idpersonne']))
{
    if(isset($_GET['delete']))
    {
        $deleteid=$_GET['delete'];
        $produits="SELECT *FROM likes WHERE idlike='$deleteid'";
        include "login.php";
        $results =mysqli_query($conn,$produits);
        $delesqlc="DELETE FROM likes Where idlike ='$deleteid'";
        $testc =mysqli_query($conn,$delesqlc);
        header("Location:clientaime.php");

    }
}





if(isset($_POST['panier']))
{
    
    if($user_id =='')
    {
        header('Location:userlogin.php');
    }
    else
    {
        $id=$_POST['idmarchandisecart'];
        $sql="SELECT * FROM chariot WHERE (idpersonne = '$user_id' AND idmarchandise='$id')";

        $cn= mysqli_query($conn,$sql);

        if(mysqli_num_rows($cn)>0)
        {
            $mess="Produit déjà ajouté au Panier";
        }else
        {
            $req="INSERT INTO chariot (idpersonne,idmarchandise) VALUES ('$user_id','$id')";
            $cnn= mysqli_query($conn,$req);
        }
    }
}





?>

















