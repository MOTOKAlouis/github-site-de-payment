


<?php
  if (!isset($conn)){
    require 'connexion.php';
  }
  
  //requet pour selectionner les differents type de montant
          //selection du code wifi a afficher pour le client
                  $sql = "SELECT DISTINCT(montant) FROM ticket WHERE statut = 0 ";

                  $statement = $conn->query($sql);
            
                  // get all publishers
                  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                   $montant;
                  if ($data) {
                  // show the publishers
                  foreach ($data as $datas) {
                      
                   $montant = $datas['montant'];
                   
                      //une autre requete pour compter le nombre de code restant par montant
                         $query = "SELECT code FROM ticket WHERE statut = 0 AND montant =:montant";
                            $statement = $conn->prepare($query);  
                            $statement->execute(
                                array(
                                'montant' => $montant
                                )
                               );  
                            $count = $statement->rowCount();  
                                   if ($count <10){
                                       //envoie mail alert
                                      include 'mailAlert_lome.php';
                                   }
                  }
                  }
            
   $conn = null;
?>