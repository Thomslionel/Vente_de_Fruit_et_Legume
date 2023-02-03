<?php
session_start();

if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset( $_SESSION['username']))
{
    if(isset($_GET['delete']))
    {
        $deleteid=$_GET['delete'];
        $produit="SELECT *FROM recette WHERE idrecette ='$deleteid'";
        include "login.php";
        $result =mysqli_query($conn,$produit);
        $row=mysqli_fetch_assoc($result);
        unlink('../image/'.$row['images']);
        $delesqlc="DELETE FROM recette Where idrecette ='$deleteid'";
        $testc =mysqli_query($conn,$delesqlc);
        header("Location:recette.php");

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
                    <a href="commande.php">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3 class="h3_admin">Commandes</h3>
                    </a>



                    
                    <a href="compteadmin.php" class="active">
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
                    

            <section class="add-products">
                        <div class="titre"> <h1 class="heading">Recettes</h1></div>
                   
            <form action="recetteingredient.php" method="POST" enctype="multipart/form-data">
                                    <div class="flex">
                                        <div class="inputBox">
                                            <span>Nom de recette </span>
                                            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
                                        </div>
                                        <div class="inputBox">
                                            <span>Ingredient1 </span>
                                            <input type="text" min="0" class="box"  placeholder="enter ingredient 1"  name="ingredient1">
                                        </div>
                                        <div class="inputBox">
                                            <span>Ingredient2 </span>
                                            <input type="text" min="0" class="box"  placeholder="enter ingredient 2"  name="ingredient2">
                                        </div>
                                        <div class="inputBox">
                                            <span>Ingredient3 </span>
                                            <input type="text" min="0" class="box"  placeholder="enter ingredient 3"  name="ingredient3">
                                        </div>

                                        <div class="inputBox">
                                            <span>Image </span>
                                            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                                        </div>
                                        <div class="inputBox">
                                            <span>Détails</span>
                                           <textarea name="details" class="box" placeholder="Entrez les details du produits" required maxlength ="500" 
                                            cols="30" rows="10"></textarea>
                                        </div>
                                            </select>
                                        </div>
                                        <input type="submit" value="Ajouter une recette" class="btn-produit" name="add_product">
                                    </div>
                                    
                                   
                </form>

            </section>

            <sectionc class="boxcontainer">
                <?php
                 include "login.php";
                    $produit="SELECT *FROM recette";
                    $result =mysqli_query($conn,$produit);
                   
                  
                  
                    if(mysqli_num_rows($result)>0)
                    {
                       
                        while( $row=mysqli_fetch_assoc($result))
                        {  
                           
                ?>

                            <div class="box">
                           
                                <img src="../image/<?=$row['images']; ?>" alt="">
                                <div class="name">Nom :<?=$row['nom']; ?></div>
                                <div class="genre">Ingredient1 :<?=$row['ingredient1']; ?></div>
                                <div class="genre">Ingredient1 :<?=$row['ingredient2']; ?></div>
                                <div class="genre">Ingredient2 :<?=$row['ingredient3']; ?></div>
                                <div class="details"> Détails :<?=$row['details']; ?></div>
                           
                            <div class="btn">
                                <a href="produits.php?delete=<?=$row['idrecette']; ?>" class="delete-btn" onclick="return confirm('Supprimer ce produit ?');">Supprimer</a>
                            </div>

                            </div>
                           

                <?php
                 
                        }
                        
                    }else
                    {
                        echo '<p class ="empty">Pas de recette ajouté</p>';
                    }
                ?>

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