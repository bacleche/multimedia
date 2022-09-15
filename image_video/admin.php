<?php
   session_start();
           
        if(isset($_POST['submit']))
           {
                       
               $nom = htmlentities(trim($_POST['nom']));
               $password = $_POST['passe'];

                       //$verify = password_verify($plaintext_password, $hash);
                      // $password =password_verify($_POST['password'], TRUE);
                       

               if($nom && $password )
                {  
                            
                   $nom = htmlentities(trim($_POST['nom']));
                   $password =$_POST['passe']; 
                 $bdd = new PDO('mysql:host=localhost;dbname=my_webcam;charset=utf8;','root','');
                   $recupuser = $bdd->prepare('SELECT * FROM admin WHERE nom = ? AND    mot_passe = ?');
                   $recupuser->execute(array($nom, $password));

                   if($recupuser->rowCount() > 0){
                       $_SESSION['nom'] = $email;
                       $_SESSION['mot_passe'] = $password;
                       $_SESSION['id'] = $recupuser->fetch()['id'];

                       header("location: espace.php");
                       exit();

                   }else {
                       echo"<script> alert('Mot de Passe ou Email inconnu !') </script>";
                     
                   }
                    
                   
               }else die("<script> alert('Information Incompletes !') </script>");
           }
              
        
            ?>