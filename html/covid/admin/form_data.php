<?php
session_start();
ob_start();
require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

#GET POST FROM
$act = $_GET['act'];
$da_id = $_GET['da_id'];

$fda_id = $_POST['fda_id'];
$fdata_name = trim($_POST['fdata_name']);

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
#select ตำบล ทั้งหมด
$sqltbse = "SELECT * FROM tb_map";
$res_tbse = $dbconnect->query($sqltbse);

#select 
if ($da_id != "") {
    $sqltb = "SELECT tbm.co_name, tbd.da_icon,tbd.da_popup,tbd.da_id
    FROM tb_map tbm
    INNER JOIN tb_data tbd ON tbm.co_id = tbd.co_id
    WHERE da_id = '$co_id' ";
    $res_tb = $dbconnect->query($sqltb);
    $rec_tb = $res_tb->fetch_array();
        $co_id = $rec_tb['co_id'];
        $da_icon = $rec_tb['da_icon'];
        $da_popup = $rec_tb['da_popup'];
        $da_last = $rec_tb['da_last'];
}
#insert
if ($act == "add" && $fda_id == "") {
    $sqlmapadd = " ";
    $dbconnect->query($sqlmapadd);

    $_SESSION['textcomplete'] = "<div class=\"alert alert-success text-center\" role=\"alert\"><span class=\"glyphicon glyphicon glyphicon-ok\" aria-hidden=\"true\"></span> เพิ่มข้อมูลสำเร็จ</div>";
    header('location:tambon.php');
}
#update
if ($act == "add" && $fda_id != "") {
    $sqlmapup = " ";
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
    <form action="form_data.php?act=add" method="post">
        <div class="form-group">
            <label for="fco_id">ตำบล:</label>
            <select class="form-control" id="fco_id" required>
                <option value=''>-- เลือกตำบล --</option>
                <?php
                while ($rec_tbse = $res_tbse->fetch_array()) {
                    $se_co_id = $rec_tbse['co_id'];
                    $se_co_name = $rec_tbse['co_name'];
                ?>
                    <option value="<?php echo $se_co_id; ?>" <?php if($co_id==$se_co_id){echo "selected";} ?> ><?php echo $se_co_name; ?></option>
                <?php } ?>
            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="co_lati">Icon:</label>

        </div>
        <div class="form-group">
            <label for="co_longti">ลองจิจูด:</label>
           
        </div>
        <input type="hidden" name="fda_id" id="fda_id" value="<?php echo $da_id; ?>" />
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <?php echo $textcomplete; ?>

    <!--Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>