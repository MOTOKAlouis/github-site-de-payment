<?php

require 'connexion.php';

//'Username'

   $req = $conn->prepare("DELETE FROM ticket_kara WHERE code=?")->execute(['Login']);
   
   if ($req){echo "code marcher";}else {echo "code pas marcher";}
   
   $req = $conn->prepare("DELETE FROM ticket_kara WHERE code=?")->execute([' ']);
   
   if ($req){echo "code marcher";}else {echo "code pas marcher";}

?>