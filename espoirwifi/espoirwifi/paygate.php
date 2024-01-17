<?php
    session_start();
  /* $_SESSION["ticket"] = "abcd";
  $_SESSION["pass_ticket"] = "1234";
    $_SESSION["montant_transac"] = "200"; */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Achat de Ticket</title>
        <link rel="icon" type="image/x-icon" href="img/logo_wifi.png">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="Page par défaut" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

        <!-- CSS only -->
        <script src="dist/js/jquery.min.js"></script>
        <link href="dist/css/bootstrap.min.css" rel="stylesheet" >

        <script src="dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="dist/js/waitjs.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script src="dist/js/sweetalert.js"></script>
<script src="dist/js/html2canvas.min.js"></script>

<link href="style_header.css" rel="stylesheet" >
<link href="style_footer.css" rel="stylesheet" >
        <style>
        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
} 

.styled-table tbody tr.myself-row {
    font-weight: bold;
    
}
/*  code pour tableau copy code */




button, input {
  padding: 20px;
  border-radius: 20px;
  outline: none;
}

input {
  cursor: default;
  border: 5px solid #2196F3;  
  transition: all 0.3s ease-in-out;
}

input:focus {
  border-color: #0078D7;  
}

button {
  cursor: pointer;
  color: #fff;
  background: #0078D7;
  border: none;
  margin-left: 10px;
  transition: all 0.3s ease-in-out;
}
button:hover {
  background: #2196F3;
}
        </style>

</head>
<body id="captureImg">
<?php
include ('header.php');
include ('alertTicket.php');
?>
    
<div class="container">
<br>
<?php 
 /*
                         if (isset($_SESSION["ticket_kara"])) {
      echo " 
          <div class='alert alert-primary d-flex align-items-center' role='alert'>
  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'/></svg>
  <div>
Voici Votre Ticket Wifi :
  </div>
</div>
                               <table class='table table-striped' >
                               <tr>
                                   <th>Nom d'utilisateur</th>
                                   <th>MOT DE PASSE</th>
                                   <th>Montant</th>
								    
                               </tr>
                               <tr>
                                   <td style='border: 1px solid black; font-weight:bold;' >".$_SESSION["ticket"]."</td>
                                   <td style='border: 1px solid black; font-weight:bold;'>" .$_SESSION["pass_ticket"]."</td>
                                   <td style='border: 1px solid black; font-weight:bold;'>". $_SESSION["montant_transac"]."</td>
								   								   
                               </tr> </table>"; 
                               echo "<br>
                               <a class='btn btn-primary' data-toggle='collapse' href='http://spero.tg/login.html' role='button' aria-expanded='false' aria-controls='collapseExample'>
                                 RETOUR A LA PAGE DE CONNEXION
                               </a> ";
} 
*/
?>
             <div id="codeTicket"></div>
             <div id="lienRetour"></div>
        
       <br>
        <div align="center">
            	SVP <b style='color:red'>PRIORISEZ</b> LES ACHATS PAR <b style='color:red'>TMONEY</b>, <i>C'EST PLUS <b>SUR</b> ET PLUS <b>FIABLE</b>. LE RETOUR EST <b>RAPIDE</b>.</i>
            </div>

	
 <div>
 
 
    </div>
		
		<!-- tuto achat de code (vidéo) -->
		
    <br>
              <div class="alert alert-primary d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
              COMMENT ACHETER UN TICKET PAR T-MONEY ou FLOOZ
               </div> 
                 
                 
                  <video controls class="embed-responsive-item" width="30%" height="20%" align="center" autoplay allowfullscreen>
                    
                        <source src="video/tuto_achat.webm" type="video/webm">
                        <source src="video/tuto_achat.mp4"  type="video/mp4">
                    
                        Impossible de visionner la vidéo, cliquer 
                        <a href="video/tuto_achat.webm">ici (format webm)</a>
                        ou
                        <a href="video/tuto_achat.mp4">ici (format mp4)</a>
                        pour la télécharger.
                    </video>
              
    	
    
		
    <br><!-- <br>-->

  
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <div>
  FORMULAIRE POUR ACHAT DE CODE
  </div>
</div>
    
	<form class="form-control" method="post">
		<div class="mb-3">
  <label for="numero" class="form-label">Numéro de Téléphone </label>
	  <input required  class="form-control" type ="number" name="phone_number" placeholder="Votre numéro Flooz ou T-money">
	  </div>
	  <div class="mb-3">
	   <label for="montant" class="form-label">Montant </label> 
	  <select class="form-select" name="amount" aria-label="Default select example">
            
            <!-- <option value="1">1</option> -->
	        <option value="100">100F (5heures - seulement via Tmoney)</option>
	            <option value="200">200F (24 heures)</option>
			        <option value="500">500F (Une semaine)</option>
	                    <option value="1500">1500F (Un mois)</option>
	                       <!--  <option value="2000">2000F</option> -->
	             <!--  <option value="13000">13000F</option> -->
	              
	      </select>
	 </div>
	 <div class="mb-3">
	      <label for="Reseau" class="form-label">Type de Réseau</label> 
	  <select class="form-select" name="network" aria-label="Default select example">  
	        <option value="TMONEY">TMONEY</option>
			
			<option value="FLOOZ">FLOOZ</option>
	      
		  </select>
	</div>
	  <input type = "submit" name="paiement" class="btn btn-primary btn-perso" value = "PAYER">
	  
	</form>
	
	<?       if(isset($_POST['paiement'])) {
          
          $phone_number = htmlentities($_POST['phone_number']);
          $montant= htmlentities($_POST['amount']);
           $network = htmlentities($_POST['network']);
           
          
      include ("traitement_transaction.php");
  
}
    ?>
		
      <br>		<!-- <br>  -->
      <!--
<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <div>
  VERIFICATION DU PAIEMENT POUR RECEVOIR LE CODE WIFI
  </div>
</div>
    

    <form id="verifpaiement" class="form-control" method="post">
	<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">IDENTIFIANT DE TRANSACTION </label>
  <input type="number" name="tx_reference" class="form-control" id="tx_reference" placeholder="Coller le Code Ici">
</div>

  <input type="submit" name ="valider" class="btn btn-primary" value="CLIQUEZ POUR AVOIR VOTRE TICKET" >
</form>
-->


	<!-- verification de paiement pour recevoir le code wifi -->

 <?php 	// SERVER
 
            
 if(isset($_POST['valider'])) {
    
      $identifiant = htmlentities($_POST['tx_reference']);
      require 'verification_paiement.php';

 }

?>
   
</div>

<?php  echo "<br><br>";
 include 'footer.php';
 echo "<br><br>"; ?>
  <script type="text/javascript">
    $(document).ready(function(){
       var identifier = <?php echo $_SESSION["identifiant"]; ?>;
       
       $('#captureImg').ready(function(){
                 waitingDialog.hide();
            });
                            
		$('.btn-perso').on('click',function (){
    waitingDialog.show();
           });
		    
		
  $('#formpay').on('keydown', function(e){
    if (e.which===13) e.preventDefault();
}); 

var identifiant = $('.identifiant').val ()
var code_wifi = $('.code_wifi').val()
  var pass_wifi = $('.pass_wifi').val()
  var montant_transac = $('.montant_transac').val()
if (typeof identifiant==='undefined'){

}else {
Swal.fire({
  title: 'confirmer la transaction et cliquer sur voir ticket',
  html: "<form  method='post'> <input type='number' name='tx_reference' readonly class='swal2-input ' value="+identifier+"><input type='submit' name='valider' value='VOIR LE TICKET' ></form>",
  focusConfirm: false,
 
})

    }

    })
   </script>
 <script>

  const copyBtn = document.getElementById('copyBtn')
const copyText = document.getElementById('copyText')

copyBtn.onclick = () => {
  copyText.select();
  document.execCommand('copy');
}
</script>
</body>
</html>

