<?php

require 'connexion.php';

     if(isset($_POST['phone_number'])) {
          
  $phone_number = htmlentities($_POST['phone_number']);
  $montant= htmlentities($_POST['amount']);
   $network = htmlentities($_POST['network']);
   
  


$token= "5549e4f1-5d96-4985-b4e1-032790e5f5f4";
$description = "achat de ticket de ".$montant;
$identifiant = time();


$curl = curl_init();
$data = array ( "auth_token" => $token, "identifier" => $identifiant, "amount"=> $montant, "phone_number"=>$phone_number, "network"=>$network, "description"=>$description);
$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://paygateglobal.com/api/v1/pay",
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
//echo $response;
$data_result = json_decode($response);

     echo " <br>
      statut : ".$data_result->tx_reference."<br>
      code_paiement :".$data_result->status."<br>";
      echo "
      <input type='hidden' class='test' value= 1 >
      <input type='hidden' class='tx_reference' value= ".$data_result->tx_reference." >
      <input type='hidden' class='status' value= ".$data_result->status." >
      
      ";
 
    }
           

    $query = "INSERT INTO transaction_bienfaiteur (numero,id_paygate,statut,identifiant,etat,montant,reseau,date_creation,heure_creation)
    VALUES (:numero, :id_paygate, :statut,:identifiant,:etat,:montant,:reseau,:date_creation,:heure_creation)";
    $query_run = $conn->prepare($query);
  $date = date('Y-m-d');
  $heure = date('H:i:s');
    $data = [
        ':numero' => $phone_number,
        ':id_paygate' => $data_result->tx_reference,
        ':statut' => $data_result->status,
        ':identifiant' => $identifiant,
        ':etat' => 0,
        ':montant' => $montant,
        ':reseau' => $network,
        ':date_creation' => $date,
         ':heure_creation' => $heure
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
      /*  $_SESSION['message'] = "Inserted Successfully";
        header('Location: student-add.php');
        exit(0); */
        
         // Starting session
     
 
            // Storing session data
            $_SESSION["numero"] = $phone_number;
            $_SESSION["identifiant"] = $identifiant;
            $_SESSION["montant"] = $montant;
  
  // partie copie d'id 
  
        echo " <table class='table styled-table table-responsive' >
        <thead>  <tr>
              <th>Copier l'ID</th>
            
              <th></th>

          </tr>
          
    </thead>
         
          <tr class='active-row'>
             <td><button id='copyBtn'><i class='ph-copy'><b>COPIEZ L'IDENTIFIANT</b></i></button><input type='text'class='identifiant' readonly id='copyText' value=$identifiant> </td>
             <td>
             </td>
              
          
          </tr> 
          </tbody>
          </table> ";
        //mettre une pause de 1min5sec pour laisser le temps au client de confirmer sa transaction
        
      

         include 'phpmail_bienfaiteur.php';
        // include 'countdown.php';
                 //sleep (30);
                //require 'verification_paiement2.php';
         
      
    }
    else
    {
       echo "
       <div class='alert alert-danger' role='alert'>
      Erreur d'insertion des données 
         </div>
       ";
    }
       
   $conn = null;
  }
?>