<?php
session_start();

if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{
  ?>                


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
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
                    <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                        <h3 class="h3_admin">Tableau de bord</h3>
                    </a>
                    <a href="produits.php">
                        <span class="material-icons-sharp">inventory</span>
                        <h3 class="h3_admin">Produits</h3>
                    </a>
                    <!--
                    <a href="#">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3 class="h3_admin">Message</h3>
                    </a>
                    -->
                    <a href="compteautilisateur.php">
                        <span class="material-icons-sharp">person_outline</span>
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
                            <h3 class="h3_admin">Déconnexion</h3>
                    </a>
                </div>
            </aside>
        
       <!---------Main----------->
            <main>
                    


                        <div class="titre">
                        <h1>Tableau de board</h1>
                        </div>
                    <section class="tableau_board">
                     

                    <div class="box">
                            <?php
                            include "login.php";
                            $total_achat_en_cours=0;
                                $sql = "SELECT * FROM commande WHERE etatcommande ='en_cours' ";
                                $result =mysqli_query($conn,$sql);
                               

                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $prix= $row['total'];
                                        $total_achat_en_cours+=$prix;
                                       
                                }
                               
                                
                            ?>
                                <h3><?php echo $total_achat_en_cours;?>Fcfa</h3>
                                <p>Achat en cours :</p>
                                <a href="commande.php" class="btn">Voir commande</a>

                        </div>


                        <div class="box">
                            <?php
                            include "login.php";
                            $total_achat_complete=0;
                                $sql = "SELECT * FROM commande WHERE etatcommande ='Livré'";
                                $result =mysqli_query($conn,$sql);
                                
                               
                            
                                while($row=mysqli_fetch_assoc($result))
                                {
                                        $total_achat_complete+=$row['total'];
                                }
                            ?>
                                <h3><?php echo $total_achat_complete;?>Fcfa</h3>
                                <p>Achat complet :</p>
                                <a href="commande.php" class="btn">Voir commande</a>
                        </div>

                        <div class="box">
                            <?php
                                include "login.php";
                                    $sql = "SELECT * FROM commande";
                                    $result =mysqli_query($conn,$sql);
                                   $nbre_commande= mysqli_num_rows($result)
                            ?>
                            <h3><?php echo $nbre_commande;?></h3>
                                <p>Commande :</p>
                                <a href="commande.php" class="btn">Voir commande</a>
                        </div>

                        <div class="box">
                            <?php
                                include "login.php";
                                    $sql = "SELECT * FROM marchandise";
                                    $result =mysqli_query($conn,$sql);
                                   $nbre_produits= mysqli_num_rows($result)
                            ?>
                            <h3><?php echo $nbre_produits;?></h3>
                                <p>Produits :</p>
                                <a href="produits.php" class="btn">Voir les produits</a>
                        </div>


                        <div class="box">
                            <?php
                                include "login.php";
                                    $sql = "SELECT * FROM personne WHERE codetypepersonne=1";
                                    $result =mysqli_query($conn,$sql);
                                   $nbre_d_utilisateur= mysqli_num_rows($result)
                            ?>
                            <h3><?php echo $nbre_d_utilisateur;?></h3>
                                <p>Utilisateurs :</p>
                                <a href="compteautilisateur.php" class="btn">Voir les comptes</a>
                        </div>



                        <div class="box">
                            <?php
                                include "login.php";
                                    $sql = "SELECT * FROM personne WHERE codetypepersonne=0";
                                    $result =mysqli_query($conn,$sql);
                                   $nbre_d_aministrateur= mysqli_num_rows($result)
                            ?>
                            <h3><?php echo $nbre_d_aministrateur;?></h3>
                                <p>Administrateurs :</p>
                                <a href="compteadmin.php" class="btn">Voir les comptes Administrateurs</a>
                        </div>

                    </section>

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