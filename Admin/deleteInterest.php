<?php
require '../index.php';
session_start();
//---------------check permission -----------------------
if(!check())
{
    header("LOCATION:../login.php");
}

$id = (isset($_GET['id']))? (int)$_GET['id'] : 0;
$delete = R::load('interest',$id);
R::trash($delete);

header("LOCATION:AdminInterest.php");
