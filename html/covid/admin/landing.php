<?php
session_start();
ob_start();
require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

#GET POST FROM
$act = $_GET['act'];
$da_id = $_GET['da_id'];

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
$sqlhome = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.da_id
FROM tb_map tbm
INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id";
$res_home = $dbconnect->query($sqlhome);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!-- auto refresh -->
    <meta http-equiv="refresh" content="300">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col">
                <p><a href="landing.php" class="btn btn-outline-info btn-lg">หน้าหลัก</a> | <a href="tambon.php" class="btn btn-outline-info btn-lg">ตำบล</a></p>
                <div class="row">
                    <div class="col"><img src="images/galert.png" width="32px">กลับจากต่างประเทศ เฝ้าระวังครบ 14 วันทั้งหมด<br><img src="images/ralert.png" width="32px">กลับจากต่างประเทศ ยังเฝ้าระวังไม่ครบ 14 วัน</div>
                    <div class="col" style="text-align: right;"><br><a href="?act=logout"><img src="images/logout.png">Logout</a></div>
                </div>
                <p style="text-align: center;"><a rel="modal:open" href="form_data.php" class="btn btn-info btn-lg">เพิ่มข้อมูลประชากร</a></p>
                <p style="text-align: center;"><?php echo $textcomplete; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col"><table id="table_id" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ตำบล</th>
                            <th>สัญลักษณ์</th>
                            <th>ดูข้อมูล</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($rec_home = $res_home->fetch_array()) {
                            $co_name = $rec_home['co_name'];
                            $co_icon = $rec_home['da_icon'];
                            $co_popup = $rec_home['da_popup'];
                            $co_da_id = $rec_home['da_id'];

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $co_name; ?></td>
                                <td style="text-align: center;"><?php
                                                                if ($co_icon == "ralertIcon") {
                                                                    echo "<img src=\"images/ralert.png\" width=\"32px\">";
                                                                } elseif ($co_icon == "galertIcon") {
                                                                    echo "<img src=\"images/galert.png\" width=\"32px\">";
                                                                } elseif ($co_icon == "yalertIcon") {
                                                                    echo "<img src=\"images/yalert.png\" width=\"32px\">";
                                                                } ?></td>
                                <td style="text-align: center;"><a rel="modal:open" href="show_data.php?da_id=<?php echo $co_da_id; ?>" class="btn btn-info btn-sm">ดูข้อมูล</a></td>
                                <td style="text-align: center;"><a rel="modal:open" href="from_data.php?da_id=<?php echo $co_da_id; ?>" class="btn btn-info btn-sm">แก้ไช</a></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">&nbsp;</div>
        </div>
    <!--Bootstrap 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
<?php $_SESSION['textcomplete'] = ''; ?>