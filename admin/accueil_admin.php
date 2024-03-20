<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-INTERFACE</title>
    <style>
        body{
            background-color: burlywood;
            color: white;
            background-image: url(image/fond.jpg.);
        }

        section{
            display: flex;
            background-color: black;
            color : white;
            box-shadow: 5%;
            height : 50px;
            align-items: center;
            
            
            
        }
        .bienvenue{
            text-align : center;
            font-family : arial;
            font-size: 20px;
            padding-top: 5%
        }

        /* a{
            color:white;
            font-size : 20px;
    
        } */

     

        .citation{
            color: black;
            background-color: white;
            opacity: 40%;
            text-align: center;
            width: auto;
            align-items: center;
        }
        .dec{
            margin-left: 35%;
        }
    </style>
</head>
<body>
   
<section>
    <ul><button><a href="acceuil.php"></a></button></ul>
    <ul><button><a href="addquestions.php">AJOUTER</a></button></ul>
    <ul><button><a href="liste_users.php">MODIFIER</a></button></ul>
    <ul><button><a href="modif.php">MODIFIER LE QUIZZ</a></button></ul>
    <ul class="dec"><button><a href="deco.php">DECONNEXION</a></button></ul>
</section>


   <H2 class="bienvenue">BIENVENUE SUR L'INTERFACE ADMIN</H2>

   <div class="citation">
    <h2>La connaissance est le pouvoir. L'information est libératrice. L'éducation est la prérogative <br>
     de l'indépendance et la clé pour libérer l'âme." - Kofi Annan</h2>
   </div>
   
   <div>
   
        
        
  </div>
</body>
</html>