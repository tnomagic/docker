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

#select ประชากร
$sqlhome = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.da_id
FROM tb_map tbm
INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id";
$res_home = $dbconnect->query($sqlhome);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home">ข้อมูลประชากร</a></li>
            <li><a data-toggle="pill" href="#menu1">ตำบล</a></li>
            <!-- <li><a data-toggle="pill" href="#menu2">เพิ่มประชากรตามตำบล</a></li> -->
        </ul>
        <p>&nbsp;</p>
        <div class="tab-content">
            <!-- home -->
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm">
                        <div style="text-align: center;"><a href="form_data.php" target="_blank"><img src="images/people.png" width="48px">เพิ่มข้อมูลประชากร</a></div>
                        <table id="table_id" class="display">
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
                                $i1 = 1;
                                while ($rec_home = $res_home->fetch_array()) {
                                    $co_name = $rec_home['co_name'];
                                    $co_icon = $rec_home['da_icon'];
                                    $co_popup = $rec_home['da_popup'];
                                    $co_da_id = $rec_home['da_id'];

                                ?>
                                    <tr>
                                        <td><?php echo $i1; ?></td>
                                        <td><?php echo $co_name; ?></td>
                                        <td style="text-align: center;"><?php
                                                                        if ($co_icon == "ralertIcon") {
                                                                            echo "<img src=\"images/ralert.png\" width=\"32px\">";
                                                                        } elseif ($co_icon == "galertIcon") {
                                                                            echo "<img src=\"images/galert.png\" width=\"32px\">";
                                                                        } elseif ($co_icon == "yalertIcon") {
                                                                            echo "<img src=\"images/yalert.png\" width=\"32px\">";
                                                                        } ?></td>
                                        <td style="text-align: center;"><input type="button" name="view" value="view" id="<?php echo $co_da_id; ?>" class="btn btn-info btn-xs view_data" /></td>
                                        <td style="text-align: center;"><a href="form_data.php?da_id=<?php echo $co_da_id; ?>" class="btn btn-info btn-xs" role="button">แก้ไข</a></td>
                                    </tr>
                                <?php $i1++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ตำบล -->
            <div id="menu1" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm">
                        <div style="text-align: center;"><a href="form_tambon.php" target="_blank"><img src="images/tambon.png" width="48px">เพิ่มข้อมูลตำบล</a></div>
                        <table id="table_id2" class="display">
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
                                $i2 = 1;
                                while ($rec_tb = $res_tb->fetch_array()) {
                                    $co_id = $rec_tb['co_id'];
                                    $co_name = $rec_tb['co_name'];
                                    $co_lati = $rec_tb['co_lati'];
                                    $co_longti = $rec_tb['co_longti'];
                                    $co_last = $rec_tb['co_last'];

                                ?>
                                    <tr>
                                        <td><?php echo $i2; ?></td>
                                        <td><?php echo $co_name; ?></td>
                                        <td style="text-align: center;"><?php echo $co_lati; ?></td>
                                        <td style="text-align: center;"><?php echo $co_longti; ?></td>
                                        <td style="text-align: center;"><?php echo $co_last; ?></td>
                                        <td style="text-align: center;"><a href="form_tambon.php?co_id=<?php echo $co_id; ?>" target="_blank" class="btn btn-info btn-xs" role="button">แก้ไข</a></td>
                                    </tr>
                                <?php $i2++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ประชากร 
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div> -->
        </div>
        <div class="row">
            <div class="col-sm-6"><img src="images/galert.png" width="32px">เฝ้าระวังครบ 14 วันทั้งหมด<br><img src="images/ralert.png" width="32px">ยังเฝ้าระวังไม่ครบ 14 วัน</div>
            <div class="col-sm-6" style="text-align: right;"><br><a href="?act=logout"><img src="images/logout.png">Logout</a></div>
        </div>
    </div>


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
        $(document).ready(function() {
            $('#table_id2').DataTable({
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
<!-- Modal view -->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ข้อมูล</h4>
            </div>
            <div class="modal-body" id="co_data_id_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
      //view data
    $(document).ready(function() {
        $('.view_data').click(function() {
            var co_da_id = $(this).attr("id");
            $.ajax({
                url: "show_data.php",
                method: "post",
                data: {
                    co_da_id: co_da_id
                },
                success: function(data) {
                    $('#co_data_id_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });
</script>