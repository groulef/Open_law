<?php

    $username = (isset($_POST['username']));
    $email = (isset($_POST['email']));
    $psswd = (isset($_POST['psswd']));
    $conf_psswd = (isset($_POST['conf_psswd']));
    $name = (isset($_POST['name']));
    $first_name = (isset($_POST['first_name']));
    if (isset($_POST['job'])) {      
       $job = $_POST['job'];
       }
    else {
	$job = "NULL";
       }
    if (isset($_POST['entreprise'])) {
       $entreprise = $_POST['entreprise'];
       }
    else {
    	 $entreprise = "NULL";
       }

    if(isset($pseudo,$pass)) 
    {
         $hostname = "adresse du serveur";
         $database = "nom de la bdd";
         $username = "user de la bdd";
         $password = "password de l'user de la bdd";
    
         $connection = mysql_connect($hostname, $username, $password) or die(mysql_error());

         // Connexion à la base
         mysql_select_db($database, $connection);
    
         $nom = mysql_real_escape_string($user);
         $password = mysql_real_escape_string($password);
    
    
         $requete = "SELECT count(*) as nb FROM membres WHERE pseudo = '".$nom."'";
    
         $req_exec = mysql_query($requete) or die(mysql_error());
    
         $resultat = mysql_fetch_assoc($req_exec);
    

         if ($resultat['nb'] == 0) 
         {
             $insertion = "INSERT INTO membres(user,password) VALUES('".$nom."', '".$password."'";
         
             $inser_exec = mysql_query($insertion) or die(mysql_error());
        
             if ($inser_exec === true) 
             {
                 session_start();
                 $_SESSION['login'] = $user;
            
                 $message = 'Votre inscription est enregistrée. <a href = "adresse de la page de connexion">Cliquez ici pour vous connecter</a>';
             }    
         }
         else
         {
             $message = 'Ce pseudo est déjà utilisé, changez-le.';
         }
    }
    else 
    {
         $message = 'Les champs "User" et "Mot de passe" doivent être remplis.';
    }
}
?>