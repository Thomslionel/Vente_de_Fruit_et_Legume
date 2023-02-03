<?php
session_start();
include "login.php";
if(isset($_POST['pusername']) && isset($_POST['ppassword']))
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;
      
    }

 

    $password=validate($_POST['ppassword']);
    $user = validate($_POST['pusername']);

        if(empty($user))
        {
            header("Location:pageloog.php?error=Veuillez saisir le nom d'utilisateur");
            exit();
        }else{
         if(empty($password))
        {
            header("Location:pageloog.php?error=Veuillez remplir le mot de passe");
            exit();
        }else{

            $ppassword=sha1($password);
            $ppassword= substr($ppassword, 0, 20);
        
            $sql = "SELECT * FROM personne WHERE pusername='$user' and ppassword='$ppassword'";
            $result =mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)===1)
            {
                $row=mysqli_fetch_assoc($result);
                if($row['pusername']===$user && $row['ppassword']===$ppassword)
                {
                   $_SESSION['nom']=$row['nom'];
                   $_SESSION['prenom']=$row['prenom'];
                   $_SESSION['username']=$row['pusername'];

                   header("Location:admin.php");
                    exit();

                }else
                {
                    header("Location:pageloog.php?error=Identifiant incorrect");
                    exit();
                }

            }else{
                header("Location:pageloog.php?error=Identifiant incorrect");
                exit();

            }
        }
    }

    
}else
{
        header("Location:pageloog.php?error");
        exit();
}



?>


