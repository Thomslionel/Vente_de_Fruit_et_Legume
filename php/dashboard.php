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
                <div class="sidebar">
                    <a href="#">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3 class="h3_admin">Tableau de bord</h3>
                    </a>
                    <a href="#" class="active">
                        <span class="material-icons-sharp">inventory</span>
                        <h3 class="h3_admin">Produits</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3 class="h3_admin">Message</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">person_outline</span>
                        <h3 class="h3_admin">Utilisateurs</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3 class="h3_admin">Commandes</h3>
                    </a>

                    
                    <a href="recette.php">
                        <span class="material-icons-sharp">cake</span>
                        <h3 class="h3_admin">Recettes</h3>
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

<h1 class="heading">add product</h1>

<form action="" method="post" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>product name (required)</span>
         <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
      </div>
      <div class="inputBox">
         <span>product price (required)</span>
         <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
      </div>
     <div class="inputBox">
         <span>image (required)</span>
         <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
     </div>
   
   </div>
   
   <input type="submit" value="add product" class="btn" name="add_product">
</form>

</section>

<section class="show-products">

<h1 class="heading">products added</h1>

<div class="box-container">

<?php
include 'login.php';
   $sql = "SELECT * FROM marchandise";
   $result =mysqli_query($conn,$sql);

   if(mysqli_num_rows($result)> 0){
      while($row=mysqli_fetch_assoc($result)){ 
?>
<div class="box">
   <img src="../uploaded_img/<?= $row['image']; ?>" alt="">
   <div class="name"><?= $row['nom']; ?></div>
   <div class="price">$<span><?= $row['prixKg']; ?></span>/-</div>
   <div class="details"><span><?= $row['details']; ?></span></div>
   <div class="flex-btn">
      <a href="update_product.php?update=<?= $row['id']; ?>" class="option-btn">update</a>
      <a href="products.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
?>

</div>

</section>

            </main>

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