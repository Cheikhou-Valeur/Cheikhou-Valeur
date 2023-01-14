<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        
            $pseudo=$passwd="";
            
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

            $pseudo=$_POST['pseudo'];
            $passwd=$_POST['passwd'];

            $query="SELECT * FROM user WHERE pseudo='$pseudo' AND  passwd='$passwd'";
           
            try
            {
        
                $db= new PDO($source,$login,$mdp);
                $resultat=$db->prepare($query);
                $resultat->execute();

              
        
            if($resultat->rowCount() > 0)
            {
                    echo "You have an account";
        
                }else
                {
                    echo "Sorry your username or password is wrong";
                }
            }
            catch(PDOException $e)
            {
        
                    $error_message=$e->getMessage();
                    echo $error_message;
                    exit();
            }

    ?>
    <p><a href="connexion.html">Ici</a></p>
</body>
</html>