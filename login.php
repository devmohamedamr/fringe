<?php
session_start();
require 'index.php';
//-----------------check---------
if(check()){
   // exit('you are login');
    header("LOCATION:Admin/admin.php");
}

//-------------validation-------------------
$validation = new \Hispanic\Validation();

$rules  = array(
    'email'=>'required|email',
    'password'=>'required',
);
$validation->server($rules);
//-------------------------------------
if(count($_POST)>0 && $validation->isValid())
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data =  R::getAll("SELECT * FROM users WHERE email='$email' AND password = '$password'");

    if($data && count($data)>0)
    {
        $_SESSION['user'] = $data;
       //$sucss = 'you are logged in ';
        header("LOCATION:Admin/admin.php");

    }
    else
    {
        $error = 'invalid user';
    }

}
//-----------------view design-------------------
require BACK.'/login.html';
