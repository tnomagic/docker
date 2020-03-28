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

#select ตำบล
$sqltb = "SELECT * FROM tb_map";
$res_tb = $dbconnect->query($sqltb);

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
                <p><a href="landing.php" class="btn btn-outline-info">หน้าหลัก</a> | <a href="tambon.php" class="btn btn-outline-info">ตำบล</a></p>
                <?php
                $sqlhome = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.da_id
            FROM tb_map tbm
            INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id";
                $res_home = $dbconnect->query($sqlhome);
                ?>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ตำบล</th>
                            <th>ละติจูด</th>
                            <th>ลองจิจูด</th>
                            <th>อัพเดทล่าสุด</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($rec_tb = $res_tb->fetch_array()) {
                            $co_id = $rec_tb['co_id'];
                            $co_name = $rec_tb['co_name'];
                            $co_lati = $rec_tb['co_lati'];
                            $co_longti = $rec_tb['co_longti'];
                            $co_last = $rec_tb['co_last'];

                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $co_name; ?></td>
                                <td style="text-align: center;"><?php echo $co_lati; ?></td>
                                <td style="text-align: center;"><?php echo $co_longti; ?></td>
                                <td style="text-align: center;"><?php echo $co_last; ?></td>
                                <td style="text-align: center;"><a rel="modal:open" href="form_tambon.php?co_id=<?php echo $co_id; ?>" class="btn btn-primary btn-xs">แก้ไข</a></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm"><img src="images/galert.png" width="32px">เฝ้าระวังครบ 14 วันทั้งหมด<br><img src="images/ralert.png" width="32px">ยังเฝ้าระวังไม่ครบ 14 วัน</div>
                    <div class="col-sm" style="text-align: right;"><br><a href="?act=logout"><img src="images/logout.png">Logout</a></div>
                </div>
            </div>
        </div>
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