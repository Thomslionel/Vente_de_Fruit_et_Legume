<?php
session_start();








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
        
            $sql = "INSERT INTO personne (nom,prenom,codetypepersonne,pusername,ppassword) VALUES('$nom','$prenom','0','$username','$ppassword')";
            $result =mysqli_query($conn,$sql);
                   header("Location:userlogin.php");
                    exit();

        }
    }
  }



?>


