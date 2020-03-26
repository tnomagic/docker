<?php
session_start();
ob_start();
//require_once('config.php');
//define('PROJECT_ROOT_PATH', __DIR__);
//$_SERVER['DOCUMENT_ROOT'];

set_time_limit(0);

$dbhost = "localhost";
$dbuser = "sa";
$dbpass = "sa";
$dbdata = "covidny";
$page_title = "Covid";
$dbconnect = new MySQLi($dbhost, $dbuser, $dbpass, $dbdata);
if ($dbconnect->connect_errno) {
    echo $dbconnect->connect_error;
    exit;
}
$dbconnect->set_charset("utf8");

#GET POST FROM
$act = $_GET['act'];
$duser = $_POST['duser'];
$dpass = $_POST['dpass'];
$dpassMD5 = md5($dpass);
#Login
if ($act == 'dlogin') {
    $res_login = $dbconnect->query("SELECT *
    FROM tb_user
    WHERE uuser = '$duser' AND upass = '$dpassMD5' ");
    $num_login = $res_login->num_rows;
    $rec_login = $res_login->fetch_array();
    $rec_login_id = $rec_login['uid'];
    $rec_login_name = $rec_login['uname'];

    if ($num_login == '1') {
        $_SESSION['$rec_login_id'] = $rec_login_id;
        $_SESSION['$rec_login_name'] = $rec_login_name;
        $dbconnect->query(" UPDATE tb_user SET ulast = now() ");
        header("location:landing.php");
    } else {
        $faillogin = 1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <form method="post" action="?act=dlogin">
                    <div class="form-group">
                        <label for="duser">Username</label>
                        <input type="email" class="form-control" id="duser" name="duser">
                    </div>
                    <div class="form-group">
                        <label for="dpass">Password</label>
                        <input type="password" class="form-control" id="dpass" name="dpass">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>