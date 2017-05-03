<?php
require '../index.php';
session_start();
//---------check permission ----------------------------
if(!check()){

    header("LOCATION:../login.php");
}

//-------------------validation----------------------
$validation = new \Hispanic\Validation();

$rules  = array(
    'title'=>'required|min_length:4|max_length:20',
    'welcom'=>'required',
    'whoare'=>'required',
    'bigtitle'=>'required',
    'vision'=>'required',
    'mission'=>'required',
    'ourvalues'=>'required',
    'team'=>'required',
);
$validation->server($rules);

//---------------update data-------------------------
if(count($_POST)>0 && $validation->isValid())
{
    $data = R::load('home', 1);
    $data->title =  $_POST['title'];;
    $data->welcom = $_POST['welcom'];
    $data->whoare = $_POST['whoare'];
    $data->bigtitle = $_POST['bigtitle'];
    $data->vision = $_POST['vision'];
    $data->mission = $_POST['mission'];
    $data->ourvalues = $_POST['ourvalues'];
    $data->team = $_POST['team'];
    R::store($data);

}
//---------------view all data---------------
$all =  R::findAll('home');
foreach($all as $a)
{
    require BACK . '/admin.html';
}

