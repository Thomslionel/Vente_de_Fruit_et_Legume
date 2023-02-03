<?php
             include 'login.php';

           /*  session_start();
            if($_SESSION['idpersonne'])
            {
                $idpersonne = $_SESSION['idpersonne'];

            }else
            {
                $idpersonne='';
            }*/

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
            <p><span class="tete">Khrono</span>Fruits</p>
            <nav class="navbar">
                    <ul>
                         <li><a href="#">Acceuil</a>  
                           
                        </li>
                            
                            <li> <a href="#">Produits</a> 
                                    <ul>
                                            <li><a href="#">Frtuits</a> </li>
                                            <li><a href="#">Legumes</a></li>
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
                <div id='menu-btn' class="fas fa-bars"></div>
                <a href="#"><i class="fa fa-search"></i></a>
                <a href="#"><i class="fa fa-heart"></i></a>
                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div class='user'>
                    <div class='btncon'><a href="#">Se connecter</a></div>
                </div>
        </header>


        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="../image/slide5.jpeg" alt=""></div>
                <div class="slide"><img src="../image/slide2.jpeg" alt=""></div>
                <div class="slide"><img src="../image/slide4.jpeg" alt=""></div>
                <div class="slide"><img src="../image/slide1.jpeg" alt=""></div>
            </div>
        </div>




        
				<div class="formulaire">

                                <div class="essai">
                                    <div class="login">Se connecter</div>
                                    <div class="register">S'inscrire</div>
                                </div>
                                
                    </div>



					
				</div>








        <!--
        <div class="vertical">
            <p><span>Nos</span>Produits</p>
            <nav class="bar">
                    <ul>
                            <li> <a href="#">Legumes</a> 
                                    <ul>
                                            <li><a href="#">Tomate</a> </li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                            <li><a href="#">Huile</a></li>
                                    </ul>
                            </li>

                            <li><a href="#">Fruits</a>
                            
                                <ul>
                                        <li><a href="#">Orange</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                        <li><a href="#">Mangue</a> </li>
                                </ul>
                             </li>
                     </ul>
            </nav>    
        </div>

        <div class="produit"> <p><span>Nos</span>Produits</p></div>

      
        -->



        <script src ="js/userjs.js" > </script>
    </body>


</html>