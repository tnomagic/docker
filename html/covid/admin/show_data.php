<?php
if (isset($_POST["co_da_id"])) {
    $output = '';
    require_once('config.php');
    $query = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.data_id,tbd.da_last
      FROM tb_map tbm
      INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id 
      WHERE tbd.data_id = '" . $_POST["co_da_id"] . "'";
    $result = $dbconnect->query($query);
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
                     <td width="30%"><label>ตำบล</label></td>  
                     <td width="70%">' . $row["co_name"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Icon</label></td>  
                     <td width="70%">' . $daicon . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ข้อมูล</label></td>  
                     <td width="70%">' . $row["da_popup"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>อัพเดทล่าสุด</label></td>  
                     <td width="70%">' . $row["da_last"] . '</td>  
                </tr>  
                ';
    }
    $output .= "</table></div>";
    echo $output;
}
