


<?php
  if (!isset($conn)){
    require 'connexion.php';
  }

  //verification si l'identifiant n'a pas encore été utiliser
    //ce code permet de supprimer le code username de la premiere ligne du fichier csv
    $query = "SELECT * FROM ticket WHERE identifier=:identifiant ";
    $statement = $conn->prepare($query);  
    $statement->execute(  
         array(  
              'identifiant'     =>  $identifiant
         )  
    );  
    $count = $statement->rowCount();  
    //echo $count;
    if($count > 0)   { 
   

 // la l'identifiant a déjà été utilisé
 echo "
 <div class='alert alert-danger' role='alert'>
         l'identifiant a été deja utilisé : $identifiant
   </div>
";
     }else{
 
       //le code n'a pas encore été utilisé
//verification du paiement par le code de reference


          $curl = curl_init();
          $data = array ( "auth_token" => "ba68bf6c-e04f-4573-ab23-396ba93f7b67", "identifier" => $identifiant);
          $post_data = json_encode($data);

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://paygateglobal.com/api/v2/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache",
              "content-type: application/json" 
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            //le code ici s'affiche
            //var_dump($response);
           // string(62) "{"error_code":403,"error_message":"Transaction non trouvée."}"
         
            $data_result = json_decode($response);
                   if(isset($data_result->error_code)){
                      // la l'identifiant a deja été utilisé
                  echo "
                  <div class='alert alert-danger' role='alert'>
                          Identifiant Invalide : $identifiant
                    </div>
                  ";
                   }else {

            //seul l'etat du statut compte;
            //statut = 0 veut dire paiement effectuer, 2 = encours , 4 = expiré, 6 = annuler
            $etat = $data_result->status;
            $montant_transaction = $data_result->amount;
           
           //si transaction effectuer alors on select un code du meme montant et on l'affiche
            if ($etat==0){
                  
              if (!isset($conn)){
                require 'connexion.php';
              }
              
                        //selection du code wifi a afficher pour le client
                  $sql = 'SELECT * 
                  FROM ticket WHERE statut = 0 AND montant ='.$montant_transaction.' limit 0,1';

                  $statement = $conn->query($sql);
            
                  // get all publishers
                  $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
                   $id_statement;$code_wifi; $pass_wifi;
                  if ($publishers) {
                  // show the publishers
                  foreach ($publishers as $publisher) {
                      
                      $id_statement = $publisher['id'];
                      $code_wifi = $publisher['code'];
                      $pass_wifi = $publisher['passwd'];
                      
                          $_SESSION["montant_transac"] = $montant_transaction;
                          $_SESSION["ticket"] = $code_wifi;
                          $_SESSION["pass_ticket"] = $pass_wifi;
                          

                      $date_achat = date('Y-m-d');
                      $heure_achat = date('H:i:s');
                      // si code afficher on doit inserer la case numero et identifiant puis modifier statut a 1
                        //req insert into set values
                                                    $data = [
                            'statut' => 1,
                           'date_achat' => $date_achat,
                           'heure_achat' => $heure_achat,
                            'identifier' => $identifiant,
                            'id' => $id_statement
                        ]; 
       $sql = "UPDATE ticket SET statut=:statut, date_achat_code=:date_achat, heure_achat_code=:heure_achat, identifier=:identifier WHERE id=:id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute($data);
                           //on verifie si tout va bien
                           if ($stmt){
                               //si la requete de modification est passee on affiche le code dans un tableau

                          echo " <b>Voici Votre Ticket Wifi</b> :
                               <table class='table table-striped' >
                               <tr>
                                   <th>USENAME</th>
                                   <th>PASSWORD</th>
                                   <th>COUT</th>
                               </tr>
                               <tr>
                                   <td style='border: 1px solid black; font-weight:bold;' >$code_wifi</td>
                                   <td style='border: 1px solid black; font-weight:bold;'>$pass_wifi</td>
                                   <td style='border: 1px solid black; font-weight:bold;'>$montant_transaction</td>
                               </tr>
                            
                           </table> "; 
                          echo "
                           <input type='hidden' class='code_wifi' value= ".$code_wifi.">
                           <input type='hidden' class='pass_wifi' value= ".$pass_wifi." >
                           <input type='hidden' class='montant_transac' value= ".$montant_transaction." >
                              "; ?>
                              <script type="text/javascript">
                                    $(document).ready(function(){
                                var code_wifi = $('.code_wifi').val()
                              var pass_wifi = $('.pass_wifi').val()
                              var montant_transac = $('.montant_transac').val()
                                      Swal.fire({
                                title: 'Voici Votre Ticket- veuillez capturer l\'ecran pour sauvegarder le ticket',
                                html: "<table id='captureTable' class='table table-striped captureTicket'><tr><th>USERNAME</th><th>PASSWORD</th><th>COUT</th></tr><tr><td>"+code_wifi+"</td><td>"+pass_wifi+"</td><td>"+montant_transaction+"</td></tr></table><input id ='capture' type='submit' name='codeTicket' value='ENREGISTREZ LE CODE' >",
                                focusConfirm: false,
                                
                              })
                          
                                    $('#capture').on('click', function (){
                                           html2canvas($("#captureTable")[0]).then((canvas) =>  {
                                 
                                          var img = canvas.toDataURL()
                                               Swal.fire({
                                            title: 'Enregistrez l\'image en faisant Appuis Long',
                                            text: 'VOTRE TICKET',
                                        
                                            imageUrl: img,
                                            imageWidth: 200,
                                            imageHeight: 200,
                                            imageAlt: 'Custom image',
                                            animation: false
                                                                                   })
                                                     })
                                
                                  })
                                    });
                              
                            
                                </script>


<?php
                           echo "<br>
  <a class='btn btn-primary' data-toggle='collapse' href='http://spero.tg/login.html' role='button' aria-expanded='false' aria-controls='collapseExample'>
    RETOUR A LA PAGE DE CONNEXION
  </a> ";

  ?>
                      <script>
            var code_wifi= "<?php echo  $_SESSION["ticket"]   ;?>"; 
           var pass_wifi = "<?php echo  $_SESSION["pass_ticket"]   ;?>"; 
             var montant_transaction = "<?php echo  $_SESSION["montant_transac"]   ;?>"; 
             var texte =    "<b>Voici Votre Ticket Wifi</b> : <table class='table table-striped'><tr><th>USERNAME</th><th>PASSWORD</th><th>COUT</th></tr>"+
                      "<tr><td>"+code_wifi+"</td><td>"+pass_wifi+"</td><td>"+montant_transaction+"</td></tr></table>";
   

var lienRetour = " <a class='btn btn-primary' data-toggle='collapse' href='http://spero.tg/login.html' role='button' aria-expanded='false' aria-controls='collapseExample'>RETOUR A LA PAGE DE CONNEXION</a>";
                      document.getElementById('codeTicket').innerHTML = texte;   
                      document.getElementById('lienRetour').innerHTML = lienRetour; 
                      
                      </script>

<?php
                                  
                           }else {
                            echo "
                            <div class='alert alert-danger' role='alert'>
                                    Erreur de Modification
                              </div>
                            ";
                           }
                    
                    } 

                  } 
                              }else{
                                echo "
                                <div class='alert alert-danger' role='alert'>
                          Avez vous validé la transaction sur votre mobile? si Non veuillez Ressayer...
                                  </div>
                                "; }
                            }
          }
                
        }
  
   $conn = null;
?>