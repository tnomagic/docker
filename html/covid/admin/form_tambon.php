<?php
session_start();
ob_start();
require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

#GET POST FROM
$act = $_GET['act'];
$co_id = $_GET['co_id'];

$fco_id = $_POST['fco_id'];
$fco_name = trim($_POST['fco_name']);
$fco_lati = trim($_POST['fco_lati']);
$fco_longti = trim($_POST['fco_longti']);

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
if ($co_id != "") {
    $sqltb = "SELECT * FROM tb_map WHERE co_id = '$co_id' ";
    $res_tb = $dbconnect->query($sqltb);
    $rec_tb = $res_tb->fetch_array();
    $co_name = $rec_tb['co_name'];
    $co_lati = $rec_tb['co_lati'];
    $co_longti = $rec_tb['co_longti'];
}
#insert
if ($act == "add" && $fco_id == "") {
    $sqlmapadd = "INSERT INTO tb_map SET co_name = '$fco_name',co_lati = '$fco_lati',co_longti = '$fco_longti',co_last = now() ";
    $dbconnect->query($sqlmapadd);

    $_SESSION['textcomplete'] = "<div class=\"alert alert-success text-center\" role=\"alert\"><span class=\"glyphicon glyphicon glyphicon-ok\" aria-hidden=\"true\"></span> เพิ่มข้อมูลสำเร็จ</div>";
    header('location:tambon.php');
}
#update
if ($act == "add" && $fco_id != "") {
    $sqlmapup = "UPDATE tb_map SET co_name = '$fco_name',co_lati = '$fco_lati',co_longti = '$fco_longti',co_last = now() WHERE co_id = '$fco_id' ";
    $dbconnect->query($sqlmapup);

    $_SESSION['textcomplete'] = "<div class=\"alert alert-success text-center\" role=\"alert\"><span class=\"glyphicon glyphicon glyphicon-ok\" aria-hidden=\"true\"></span> แก้ไขข้อมูลสำเร็จ</div>";
    header('location:tambon.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

                <form action="form_tambon.php?act=add" method="post">
                    <div class="form-group">
                        <label for="co_name">ตำบล:</label>
                        <input required value="<?php echo $co_name; ?>" type="text" class="form-control" id="fco_name" name="fco_name" placeholder="ตำบล... - กลับจาก...">
                    </div>
                    <div class="form-group">
                        <label for="co_lati">ละติจูด:</label>
                        <input required maxlength="15" value="<?php echo $co_lati; ?>" type="text" class="form-control" id="fco_lati" name="fco_lati" placeholder="XX.XXXXXXX" onkeypress="return isNumberKey(event)">
                    </div>
                    <div class="form-group">
                        <label for="co_longti">ลองจิจูด:</label>
                        <input required maxlength="15" value="<?php echo $co_longti; ?>" type="text" class="form-control" id="fco_longti" name="fco_longti" placeholder="XX.XXXXXXX" onkeypress="return isNumberKey(event)">
                    </div>
                    <input type="hidden" name="fco_id" id="fco_id" value="<?php echo $co_id; ?>" />
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <?php echo $textcomplete; ?>

    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <!--Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

</html>