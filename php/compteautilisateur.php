<?php
session_start();

if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{

    if(isset($_GET['delete']))
    {
        $deleteid=$_GET['delete'];
        include "login.php";
        $delesqlc="DELETE FROM commande Where idpersonne ='$deleteid'";
        $testc =mysqli_query($conn,$delesqlc);
        $delesqlp="DELETE FROM personne Where idpersonne ='$deleteid'";
        $testp =mysqli_query($conn,$delesqlp);

        header("Location:compteautilisateur.php");

    }

  ?>                


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    </head>

    <body class="admin">

        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="../image/logo.png" alt="logo">
                        <h2 class="h2_admin"><?php echo $_SESSION['nom'].' '. $_SESSION['prenom'] ;?></h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>

                <div class="horloge">
                                <div class="date"></div>
                                <div class="heures"></div> 
                </div>
                        
                <div class="sidebar">
                    <a href="admin.php" >
                        <span class="material-icons-sharp">grid_view</span>
                        <h3 class="h3_admin">Tableau de bord</h3>
                    </a>
                    <a href="produits.php" >
                        <span class="material-icons-sharp">inventory</span>
                        <h3 class="h3_admin">Produits</h3>
                    </a>
                     <!--
                    <a href="#">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3 class="h3_admin">Message</h3>
                    </a>
                    -->
                    <a href="compteautilisateur.php" class="active">
                        <span class="material-icons-sharp" >person_outline</span>
                        <h3 class="h3_admin">Utilisateurs</h3>
                    </a>
                    <a href="commande.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3 class="h3_admin">Commandes</h3>
                    </a>



                    
                    <a href="recette.php">
                        <span class="material-icons-sharp">cake</span>
                        <h3 class="h3_admin">Recettes</h3>
                    </a>
                    <a href="compteadmin.php">
                        <span class="material-icons-sharp">account_circle</span>
                        <h3 class="h3_admin">Bienvenue <?php echo $_SESSION['nom']?></h3>
                    </a>

                       
                    <a href="decon.php">
                        <span class="material-icons-sharp">logout</span>
                            <h3 class="h3_admin">D??connexion</h3>
                    </a>
                </div>
            </aside>
        
       <!---------Main----------->
            <main>
                    

            <section class="placed-orders">
                        <div class="titre"> <h1 class="heading">Comptes Utilisateurs</h1></div>

                        <div class="boxcontainer">
                            <?php
                             include "login.php";
                            $produit="SELECT *FROM personne WHERE codetypepersonne=1";
                            $result =mysqli_query($conn,$produit);
                           
                            
                          
                          
                            if(mysqli_num_rows($result)>0)
                            {
                               
                                while( $row=mysqli_fetch_assoc($result))
                                {    include "login.php";
                                    $nom=$row['nom'];
                                    $pnom=$row['prenom'];
                            ?>
                             <div class="box">

                                <p>Nom : <span><?=$row['nom'];?></span></p>
                                <p>Prenom <span><?=$row['prenom'];?></span></p>
                                <p>Nom d'utilisateur : <span><?=$row['pusername'];?> </p> 

                                <a href="compteautilisateur.php?delete=<?=$row['idpersonne']; ?>" class="btn" onclick="return confirm('Supprimer cet utilisateur ?');">Supprimer</a>
                             </div>
                            <?php
                                 }
                                }else{
                                    echo "<p class ='empty'>Pas d'utilisateurs</p>";
                                }
                            ?>
                        </div>
        </main>


            <script src="../js/script.js"> </script>
                            </div>
     </body>
    
</html>

<?php
        }else
        {
            session_start();
            session_unset();
            session_destroy();
            header("Location:pageloog.php");
            exit();
        }
?>