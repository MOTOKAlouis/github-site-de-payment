 <?php  
 session_start();  


require 'connexion.php';
  
      if(isset($_POST["login"]))  
      {  
          echo "im here";
          
         echo $_POST["password"];
         echo  "<br>".$_POST["username"];
                $query = "SELECT * FROM admin WHERE user = :username AND passwd = :passwd";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'passwd'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:import_excel.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
        
  

 ?>  