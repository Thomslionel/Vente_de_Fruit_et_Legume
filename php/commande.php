<?php
session_start();

if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{
    if(isset($_POST['update_payment']))
    {
  
        include "login.php";
        $commandeid=$_POST['order_id'];
        $status=$_POST['payment_status'];
        $miseajour="UPDATE commande SET etatcommande ='$status' WHERE id_commande='$commandeid'";
        $results =mysqli_query($conn,$miseajour);
       // $rows=mysqli_fetch_assoc($results);
        

    }

    if(isset($_GET['delete']))
    {
        $deleteid=$_GET['delete'];
        include "login.php";
        $delesqlc="DELETE FROM commande Where id_commande ='$deleteid'";
        $testc =mysqli_query($conn,$delesqlc);
        header("Location:commande.php");

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
                    <a href="compteautilisateur.php">
                        <span class="material-icons-sharp">person_outline</span>
                        <h3 class="h3_admin">Utilisateurs</h3>
                    </a>
                    <a href="commande.php" class="active">
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
                    

            <section class="placed-orders">
                        <div class="titre"> <h1 class="heading">Commande</h1></div>

                        <div class="boxcontainer">
                            <?php
                             include "login.php";
                            $produit="SELECT *FROM commande";
                            $result =mysqli_query($conn,$produit);
                           
                            
                          
                          
                            if(mysqli_num_rows($result)>0)
                            {
                               
                                while( $row=mysqli_fetch_assoc($result))
                                {    
                                    
                                    $idpersonne=$row['idpersonne'];
                                    
                                    $produits="SELECT *FROM personne WHERE idpersonne='$idpersonne'";
                                    $results =mysqli_query($conn,$produits);

                                    while( $rows=mysqli_fetch_assoc($results))
                                    {  
                                            $id=$row['id_commande'];
                                            $nom=$rows['nom'];
                                            $prenom=$rows['prenom'];
                            ?>
                             <div class="box">

                                <p>Commande du : <span><?=$row['datecommande'];?></span></p>
                                <p>Nom de l'acheteur : <span><?=$nom;?></span></p>
                                <p>Prenom de l'acheteur : <span><?=$prenom;?></span> </p> 
                                <p>Total produit : <span><?=$row['total'];?></span></p>
                                <p>Etat commande : <span><?=$row['etatcommande'];?></span></p>
                                <form action="" method="POST">
                                <input type="hidden" name="order_id" value ="<?=$row['id_commande'];?>">
                                    <select name="payment_status" class="drop-down">
                                        <option value="" selected disabled>
                                                <?=$row['etatcommande'];?>
                                        </option>
                                        <option value="en_cours">en_cours</option>
                                        <option value="Livré">Livré</option>

                                    </select>
                                    <div class="flex-btn">
                                    <input type="submit" value="Mise à jours" class="btn" name="update_payment">
                                    <a href="commande.php?delete=<?=$row['id_commande']; ?>" class="btn" onclick="return confirm('Supprimer cette commande ?');">Supprimer</a>
                                    </div>
                                </form>

                             </div>
                            <?php
                                    }
                                 }
                                }else{
                                    echo '<p class ="empty">Pas de Commande ajoutée</p>';
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