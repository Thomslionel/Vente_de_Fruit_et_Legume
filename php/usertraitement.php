<?php
session_start();
include "login.php";
if(isset($_POST['pusernameuser']) && isset($_POST['ppassworduser']))
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;
      
    }

 

    $password=validate($_POST['ppassworduser']);
    $user = validate($_POST['pusernameuser']);

        if(empty($user))
        {
            header("Location:userlogin.php?error=Veuillez saisir le nom d'utilisateur");
            exit();
        }else{
         if(empty($password))
        {
            header("Location:userlogin.php?error=Veuillez remplir le mot de passe");
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
                   $_SESSION['idpersonne']=$row['idpersonne'];
                   header("Location:../index.php");
                    exit();

                }else
                {
                    header("Location:userlogin.php?error=Identifiant incorrect");
                    exit();
                }

            }else{
                header("Location:userlogin.php?error=Identifiant incorrect");
                exit();

            }
        }
    }

    
}









if(isset($_POST['enregistrer']))


//isset($_POST['nomuser']) && isset($_POST['prenomuser']) && isset($_POST['usernameuser']) && isset($_POST['passworduser'])
{
    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data =htmlspecialchars($data);
        return $data;
      
    }

 

    $password=validate($_POST['passworduser']);
    $username = validate($_POST['usernameuser']);
    $nom=validate($_POST['nomuser']);
    $prenom=validate($_POST['prenomuser']);

        if(empty($username))
        {
            header("Location:userinscription.php?error=Veuillez saisir le nom d'utilisateur");
            exit();
        }else{
         if(empty($password))
        {
            header("Location:userinscription.php?error=Veuillez remplir le mot de passe");
            exit();
        }else{

            $ppassword=sha1($password);
            $ppassword= substr($ppassword, 0, 20);
        
            $sql = "INSERT INTO personne (nom,prenom,codetypepersonne,pusername,ppassword) VALUES('$nom','$prenom','1','$username','$ppassword')";
            $result =mysqli_query($conn,$sql);
                   header("Location:userlogin.php");
                    exit();

        }
    }
  }



?>


