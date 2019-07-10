<?php 
//session start
session_start();

//Include database connection details
require_once('connection.php');

//Array to store validation error
$errmsg_array = array();

//validation error flag
$errflag = false;

//function to sanitize values received from the form, Prevents SQL Injection
function clean($str){
    $str = @trim($str);
    if(get_magic_quotes_gpc()){
        $str = stripslashes($str);
    }
    return mysqli_real_escape_string($str);
}


//sanitize the POST Values
$username = clean($_POST['username']);
$password = clean($_POST['pass']);

//Input Validations
if($username == ''){
    $errmsg_array[] = 'Username lost';
    $errflag = true;
}

if($password == ''){
    $errmsg_array[] = 'Password lost';
    $errflag = true;
}

//If there are input validations, redirect back to the login form
if($errflag){
    $_SESSION['ERRMSG_ARR'] = $errmsg_array;
    session_write_close();
    header('Location:Index.php');
    exit();
}

//create Query
$qry =  "SELECT * FROM member WHERE username = '$username' AND  password = '".md5($_POST['pass'])."'";
$result = mysqli_query($qry);

//check Whether the query was successful or not
if($result){
    if(mysqli_num_rows($result) > 0){
        //Login Successful
        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['username'];
        $_SESSION['SESS_LAST_NAME'] = $member['password'];
        session_write_close();
        header('Location:home.php');
        exit();
    
}else{
    //Login unsuccess
    $errmsg_array[] = 'username and password not found';
    $errflag = true;
    if($errflag){
        $_SESSION['ERRMSG_ARR'] = $errmsg_array;
        session_write_close();
        header('Location:Index.php');
        exit();
    }
}
}else{
    die("Query Failed");
}


?>