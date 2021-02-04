<?php
session_start();
include "user.php";
$user=new user();
if(isset($_POST['uname']) && ($_POST['ucontact'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $contact = $_POST['ucontact'];
    $password = md5($_POST['upassword']);
    $register = $user-> userSignup($name, $email, $contact, $password);
    if($register == 1){
        echo 1;
    }else if($register == 0){
        echo 0;
    }
}
if(isset($_POST['email']) && ($_POST['password'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $info=$user->login($email, $password);
    if($info == 0){
        echo 0;
    }else if($info['is_admin']==1){
        echo 1;
        $_SESSION['admin'] = $info;
    }else if($info['is_admin']==0){
        echo 2;
        $_SESSION['user'] = $info;
    }
}
?>