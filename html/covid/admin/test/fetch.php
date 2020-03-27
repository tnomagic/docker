 <?php  
 //fetch.php  

 require_once("config.php");
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.data_id
      FROM tb_map tbm
      INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id 
      WHERE tbd.data_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>