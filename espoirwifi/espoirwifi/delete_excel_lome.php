<?php

require 'connexion.php';

   $req = $conn->prepare("DELETE FROM ticket WHERE code=?")->execute(['Username',' ']);
   
   if ($req){echo "code marcher";}else {echo "code pas marcher";}


?>