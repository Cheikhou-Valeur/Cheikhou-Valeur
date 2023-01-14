<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
         <?php
        
            $nom=$pseudo=$mail=$passwd=$passwd2="";
            
            $source="mysql:host=localhost;dbname=projectBase";
            $login="root";
            $mdp="";
        
        
            function secure($data)
            {
                $doe=trim($data);
                $doe=stripcslashes($data);
                $doe=strip_tags($data);
                return $doe;
            }
        
        
            $nom=$_POST['nom'];
            $pseudo=$_POST['pseudo'];
            $mail=$_POST['mail'];
            $passwd=$_POST['passwd'];
            $passwd2=$_POST['passwd2'];

            $query="SELECT * FROM user WHERE pseudo='$pseudo' OR mail='$mail' OR passwd='$passwd'";
            echo 'je suis '.$nom.'<br/>';
        
            try
            {
        
                $db= new PDO($source,$login,$mdp);
                echo "well connected<br/>";
        
                $resultat=$db->prepare($query);
                $resultat->execute();
        
               if($resultat->rowCount() > 0)
               {
                    echo "You cant create an account like this because your pseudo or name or mail exists already";
        
                }else
                {
                   
                    $sql="INSERT INTO user (nom,pseudo,mail,passwd) VALUES ('$nom','$pseudo','$mail','$passwd')";
                    $req=$db->prepare($sql);
                    $req->execute();
                    echo "Bien inseree";
                }
            } catch(PDOException $e){
        
                $error_message=$e->getMessage();
                echo $error_message;
                exit();
            }
        
        ?> 
        <p><a href="inscription.html">ici</a></p>
    </body>
</html> 