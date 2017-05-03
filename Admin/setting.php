<?php
require '../index.php';
session_start();
//---------------check permission -----------------------
if(!check())
{
    header("LOCATION:../login.php");
}

$validation = new \Hispanic\Validation();

$rules  = array(
    'name'=>'required',
    'email'=>'required|email',
    'password'=>'required',
);
$validation->server($rules);
//----------------------------------------------------------
if(count($_POST)>0 && $validation->isValid())
{
    $id = $_SESSION['user'][0]['id'];
    $data = R::load('users', $id);
    $data->name =  $_POST['name'];;
    $data->email = $_POST['email'];
    $data->password = $_POST['password'];
    R::store($data);

//------------------view data-------------------
}
$id = $_SESSION['user'][0]['id'];
//$all = R::load('users',$id);

$sql = "SELECT * FROM users WHERE id = '$id' ";
$rows = R::getAll($sql);
$all = R::convertToBeans('all',$rows);

foreach($all as $a)
{
    require BACK . '/setting.html';
}