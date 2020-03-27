<?php
session_start();
ob_start();
require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

#GET POST FROM
$act = $_GET['act'];
$data_id = $_GET['data_id'];

#session
$rec_login_id = $_SESSION['$rec_login_id'];

#Check session id if login
if (empty($rec_login_id)) {
    $_SESSION['faillogin'] = 1;
    header('location:index.php');
}

#logout
if ($act == 'logout') {
    session_destroy();
    header('location:index.php');
    exit();
}

#select

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fancybox -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>

<body>
    <div class="container">
        <p>&nbsp;</p>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">หน้าหลัก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ตำบล</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- home -->
            <?php
            $sqlhome = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.data_id
            FROM tb_map tbm
            INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id";
            $res_home = $dbconnect->query($sqlhome);

            ?>
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-sm">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>ตำบล</th>
                                    <th>สัญลักษณ์</th>
                                    <th>ดูข้อมูล</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($rec_home = $res_home->fetch_array()) {
                                    $co_name = $rec_home['co_name'];
                                    $co_icon = $rec_home['da_icon'];
                                    $co_popup = $rec_home['da_popup'];
                                    $co_data_id = $rec_home['data_id'];

                                ?>
                                    <tr>
                                        <td><?php echo $co_name; ?></td>
                                        <td style="text-align: center;"><?php
                                                                        if ($co_icon == "ralertIcon") {
                                                                            echo "<img src=\"images/ralert.png\" width=\"32px\">";
                                                                        } elseif ($co_icon == "galertIcon") {
                                                                            echo "<img src=\"images/galert.png\" width=\"32px\">";
                                                                        } elseif ($co_icon == "yalertIcon") {
                                                                            echo "<img src=\"images/yalert.png\" width=\"32px\">";
                                                                        } ?></td>
                                        <td style="text-align: center;"><a data-fancybox data-type="iframe" data-src="show_data.php?data_id=<?php echo $co_data_id; ?>" href="javascript:;" class="btn btn-primary fancybox">ดูข้อมูล</a></td>
                                        <td style="text-align: center;"><a href="edit_data.php?data_id=<?php echo $co_data_id; ?>" class="btn btn-info btn-xs" role="button">แก้ไข</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ตำบล -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.3..</div>
        </div>
    </div>
    <div style="text-align:center;"><a href="?act=logout"><img src="images/logout.png">Logout</a></div>
    <!--Bootstrap
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    --><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- fancybox -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!--Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable({
                "lengthMenu": [
                    [30, 50, 100, -1],
                    [30, 50, 100, "ทั้งหมด"]
                ],
                //"autoWidth": true,
                "language": {
                    "lengthMenu": "แสดง _MENU_ ต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": " ไม่มีข้อมูล "
                }
            });
        });
    </script>
</body>

</html>