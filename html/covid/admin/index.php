<?php
session_start();
ob_start();
require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

#GET POST FROM
$act = $_GET['act'];
$duser = $_POST['duser'];
$dpass = $_POST['dpass'];
$dpassMD5 = md5($dpass);
$faillogin = $_SESSION['faillogin'];

#Login
if ($act == 'dlogin') {
    $sqls = "SELECT *
    FROM tb_users
    WHERE user_user = '$duser' AND user_pass = '$dpassMD5'";

    $res_login = $dbconnect->query($sqls);
    $num_login = $res_login->num_rows;
    $rec_login = $res_login->fetch_array();
    $rec_login_id = $rec_login['user_id'];

    if ($num_login == '1') {
        $_SESSION['$rec_login_id'] = $rec_login_id;
        $dbconnect->query(" UPDATE tb_users SET user_last = now() WHERE user_user = '$duser' ");
        header("location:landing.php");
    } else {
        $faillogin=1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
        <div class="row">
            <div class="col">
            
            </div>
            <div class="col">
                <form method="post" action="?act=dlogin">
                    <div class="form-group">
                        <label for="duser">Username</label>
                        <input type="text" class="form-control" id="duser" name="duser">
                    </div>
                    <div class="form-group">
                        <label for="dpass">Password</label>
                        <input type="password" class="form-control" id="dpass" name="dpass">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <?php if ($faillogin == '1') {
                    echo "<div class=\"alert alert-danger text-center\" role=\"alert\"><span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span> Username หรือ Password ผิดพลาด</div>";
                } ?>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>