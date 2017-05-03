<?php
require '../index.php';
session_start();
//---------------check permission -----------------------
if(!check())
{
    header("LOCATION:../login.php");
}
//--------------validation--------------------
$validation = new \Hispanic\Validation();

$rules  = array(
    'title'=>'required|min_length:4|max_length:20',
    'address'=>'required',
    'email'=>'required|email',
    'phone'=>'required',
    'working'=>'required',
);
$validation->server($rules);
//----------------------------------------------------------
if(count($_POST)>0 && $validation->isValid())
{
    $data = R::load('contact', 1);
    $data->title =  $_POST['title'];;
    $data->address = $_POST['address'];
    $data->email = $_POST['email'];
    $data->phone = $_POST['phone'];
    $data->working = $_POST['working'];
    R::store($data);
}
//------------------view all data-------------------

$all =  R::findAll('contact');
foreach($all as $a)
{
    require BACK . '/AdminContact.html';
}

