<?php
if (isset($_POST["employee_id"])) {
    $output = '';
    $connect = mysqli_connect("localhost", "sa", "sa", "covidny");
    $query = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.data_id
      FROM tb_map tbm
      INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id 
      WHERE tbd.data_id = '" . $_POST["employee_id"] . "'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while ($row = mysqli_fetch_array($result)) {
        if ($row["da_icon"] == "ralertIcon") {
            $daicon = "<img src=\"../images/ralert.png\" width=\"32px\">";
        } elseif ($row["da_icon"] == "galertIcon") {
            $daicon = "<img src=\"../images/galert.png\" width=\"32px\">";
        } elseif ($row["da_icon"] == "yalertIcon") {
            $daicon = "<img src=\"../images/yalert.png\" width=\"32px\">";
        }

        $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">' . $row["co_name"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">' . $daicon . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">' . $row["da_popup"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Designation</label></td>  
                     <td width="70%">' . $row["data_id"] . '</td>  
                </tr>  
                ';
    }
    $output .= "</table></div>";
    echo $output;
}
