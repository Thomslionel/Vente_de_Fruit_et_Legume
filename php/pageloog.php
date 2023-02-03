

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    </head>

    <body class="page">
    <?php
            if(isset($_GET['error'])){?>

                <p class="error"><?php echo $_GET['error'] ;?></p>
            <?php }?>
        
        <div class="login">

            <tr>
                <td>
                    <h2>Connexion</h2>
                </td>
            </tr>

           
            <form action="connexion.php" method="POST">

            <table>
                <tr>
                    <td>
                        <p>Nom d'utilisateur</p>  
                    </td>
                    <td>
                        <input type="text" name="pusername"  placeholder="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Mot de passe</p>
                    </td>
                    <td>
                        <input type="password" name="ppassword"  placeholder="password">
                    </td>
                </tr>
       
            </table>

                    <div class="con">
                    <input type="submit" name="valider" value="Connexion">
                </div>
               

        </form>
           
        </div>
    </body>
    
</html>