<?php

session_start();
include 'login.php';

if(isset($_SESSION['idpersonne']))
{
    $user_id= $_SESSION['idpersonne'];
}else
{
    $user_id='';
    header("Location:userlogin.php");
}





$prixtotal=0;
                             
include 'login.php';

$req="SELECT * FROM chariot  WHERE idpersonne= '$user_id'";

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
      
       $prixtotal=$prixtotal+$rows['prixKg'];
   }
}
}
  
















if(isset($_POST['commande']))
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;
      
    }

 
    $adresse=validate($_POST['adresse']);
    $pays=$_POST['pays'];
    $moyent=$_POST['modepayement'];
    $numero=$_POST['numero'];
    $anniversaire=$_POST['anniversaire'];
    $ville=validate($_POST['ville']);
    $quartier=validate($_POST['quartier']);
   

    if(empty($ville) && empty($pays) && empty($adresse) && empty($moyent) && empty($numero) && empty($quartier) &&  empty($anniversaire) )
    {
        header("Location:usercommande.php.php?error=Veuillez remplir tous les identifiants");
        exit();
    }else{
    
    {

    
        $sql = "INSERT INTO commande (idpersonne,adresse,pays,moyent,numero,ville,quartier,total,etatcommande) VALUES('$user_id','$adresse','$pays','$moyent','$numero','$ville','$quartier','$prixtotal','en_cours')";
        $result =mysqli_query($conn,$sql);
               header("Location:../index.php");
                exit();

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
                         <li><a href="../index.php">Acceuil</a>  
                           
                        </li>
                            
                            <li> <a href="#">Produits</a> 
                                    <ul>
                                            <li><a href="#">Frtuits</a> </li>
                                            <li><a href="legumes.php">Legumes</a></li>
                                    </ul>
                            </li>

                            <li><a href="#">Blogs/Reccettes</a>
                            
                                <ul>
                                        <li><a href="#">Recettes Fruits</a> </li>
                                        <li><a href="#">Recettes Legumes</a> </li>
                                </ul>
                             </li>
                            <li><a href="#">A propos de nous</a>
                        
                                <ul>
                                    <li><a href="#"> Qui sommes nous?</a></li>
                                    <li><a href="#"> Nos conctacts</a></li>
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

       




        <div class="produit"> <p><span>Vos</span>KhronoFruits</p></div>





        <section class="container">
      <form action="#" method='POST' class="form">


      <div class="input-box address">
          <label>Adresse</label>
          <input type="text" name='adresse' placeholder="Entrée votre adresse" required />
          <div class="column">
            <div class="select-box">
              <select name='pays'>
                <option hidden >Pays</option>
                <option>Burkina Faso</option>
                <option>Bénin</option>
                <option>Togo</option>
                <option>Rwanda</option>
              </select>
            </div>
            <div class="select-box">
              <select name='modepayement'>
                <option  hidden>Mode de payement</option>
                <option>OrangeMoney</option>
                <option>MobileMoney</option>
                <option>Chèque</option>
                <option>Espèce</option>
              </select>
            </div>
            <input type="text" name='ville' placeholder="Entré votre ville" required />
          </div>
          <div class="column">
            <input type="text" name='quartier' placeholder="Entré votre quartier" required />
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Numero de téléphone</label>
            <input type="number" name='numero' placeholder="Enter phone number" required />
          </div>
        </div>
    </div>
       
       <input type='submit' name='commande' value="Commandez">
      </form>
    </section>




    <?php
                              $prixtotal=0;
                             
                             include 'login.php';

                        $req="SELECT * FROM chariot  WHERE idpersonne= '$user_id'";

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
                                   
                                    $prixtotal=$prixtotal+$rows['prixKg'];
                                }
                            }
                        }
                               
                    ?>

                                <div class="commande">
                                           
                                                            
                                                               
                                            <p>Total de vos achats : <?=$prixtotal;?> Fcfa</p>
                                        
                            
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

