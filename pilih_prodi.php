<?php
   
           
   if(isset($_POST['get_option']))
   {

    include "config/conection.php";
    

     $id_fakultas = $_POST['get_option'];
     $find=$connection->query("select * from tb_prodi where id_fakultas='$id_fakultas'");

     echo "<option value=>- pilih prodi -</option>";
     while($row=mysqli_fetch_array($find))
     {
       echo "<option value=".$row['ID'].">".$row['NAMA']."</option>";
     }
   
     exit;
   }

?>