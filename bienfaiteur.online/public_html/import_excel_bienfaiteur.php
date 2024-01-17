<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Importation tickets</title>
        <link rel="icon" type="image/x-icon" href="img/logo_wifi.png">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="Page par défaut" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

        <style>
        
        </style>

</head>
<body>
<div class="container">
    
	<h1>Base 2 Ajouts de Tickets</h1>

	<form method="POST"  enctype="multipart/form-data">
  <div class="form-group">
			<label>Prix du Ticket</label>
			<input type="number" name="prix" class="form-control">
		</div>
  <div class="form-group">
			<label>Upload Excel File</label>
			<input type="file" name="file" class="form-control">
		</div>
    
		<div class="form-group">
			<button type="submit" name="Submit" class="btn btn-success">Upload</button>
		</div>
		
	</form>
	<?php

require 'excel/SpreadsheetReader_CSV.php';

require('excel/php-excel-reader/excel_reader2.php');
require('excel/SpreadsheetReader.php');

require('connexion.php');

if(isset($_POST['Submit'])){

  $prix = htmlentities($_POST['prix']);
  $mimes = ['application/vnd.ms-excel','text/csv','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

    $uploadFilePath = 'uploads_bienfaiteur/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
    
    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

   
  
    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
 
        $code = isset($Row[0]) ? $Row[0] : '';
        $passwd = isset($Row[1]) ? $Row[1] : '';
     // echo "<br>code : $code -- pass: $passwd <br>";
      
        $query = "INSERT INTO ticket_bienfaiteur (code,passwd,statut,montant,date_creation,heure_creation)
        VALUES (:code, :passwd, :statut, :montant,:date_creation,:heure_creation)";
        $query_run = $conn->prepare($query);
      $date = date('Y-m-d');
      $heure = date('H:i:s');
        $data = [
            ':code' => $code,
            ':passwd' => $passwd,
            ':statut' => 0,
            ':montant' => $prix,
            ':date_creation' => $date,
             ':heure_creation' => $heure
        ];
        $query_execute = $query_run->execute($data);
        if (!$query_execute){
          die("<br> Probleme lors de l'insertion des donnees.."); 
        }
    }
    //ce code permet de supprimer le code username de la premiere ligne du fichier csv ('Username')
    $query = "DELETE FROM ticket_bienfaiteur WHERE code=?";
    $query_run = $conn->prepare($query);
    $req = $query_run->execute(['Login']);
    $req = $query_run->execute([' ']);
    $req = $query_run->execute(['Username']);

    echo "
    <div class='alert alert-info' role='alert'>
      Doonees inserer avec succes
      </div>
  ";
  }
}else { 
  die("<br/>Sorry, File type is not allowed. Only Excel file."); 
}
}//fin If submit
?>
   </div> <!-- fin div container -->
</body>
</html>