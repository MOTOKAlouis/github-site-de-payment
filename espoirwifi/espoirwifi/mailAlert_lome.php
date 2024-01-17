 <?php
         $to = "bossa.komlanvi@gmail.com";
         $subject = "STOCK EPUISE TICKET DE  $montant F";
                // Storing session data
               
         
         $message = "<b>stock restant ticket de $montant f</b>";
         $message .= "<h1>Ville: LOME </h1>";
         $message .= "<h1>Montant : $montant </h1>";
         $message .= "<h1>Reste  : $count</h1>";
         
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