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
);
$validation->server($rules);
//--------------end validation -------

if(count($_POST)>0)
{
    $data = R::dispense('interest');
    $data->name = $_POST['name'];
    $data->description= $_POST['description'];
    R::store($data);
}
//---------------view all interest-------
$all =  R::findAll('interest');
    require BACK . '/AdminInterest.html';
