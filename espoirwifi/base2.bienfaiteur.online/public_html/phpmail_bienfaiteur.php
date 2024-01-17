 <?php
         $to = "dovepascal@gmail.com";
         $subject = "ACHAT DE TICKET DE $montant";
                // Storing session data
               
         
         $message = "<b>Achat de Ticket de $montant F </b>";
         $message = "<b>Ville: <i>LOME(Bienfaiteur)</i> </b>";
         $message .= "<h1>Numero : $phone_number</h1>";
         $message .= "<h1>Identifiant  : $identifiant</h1>";
         
         $header = "From:info@espoirwifi.nouplepe-tg.com \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
         }else {
           // echo "Message could not be sent...";
         }
      ?>