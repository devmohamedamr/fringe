<?php
require '../index.php';
session_start();
//---------------check permission -----------------------
if(!check())
{
    header("LOCATION:../login.php");
}
//----------------------upload image ----------------------
if(Upload::formIsSubmitted())
{
    $upload = new Upload('file'); // give the constructor the name of the html input field
    $upload->setDirectory('images')->create(true);
    $upload->addRules([
        'size' => 1500,
        'extensions' => 'jpg|png|pdf',
    ])->customErrorMessages([
        'size' => 'Please upload files that are less than 2MB size',
        'extensions' => 'Please upload only jpg, png or pdf'
    ]);
    $upload->encryptFileNames(true)->only('jpg');
    $upload->start();

    if($upload->successfulFilesHas())
    {
        foreach($upload->successFiles() as $file)
        {
            // now you have the $file object to format the message how you prefer
            $imageup = R::load('about', 1);
            $filename = $file->name;
            $imageup->solutions = $filename;
            R::store($imageup);
        }
    }
}
//------------------------------validation--------------------------
$validation = new \Hispanic\Validation();

$rules  = array(
    'title'=>'required|min_length:4|max_length:20',
    'services'=>'required',
);
$validation->server($rules);
//----------------------------------------------------------
if(count($_POST)>0 && $validation->isValid())
{
    $data = R::load('about', 1);
    $data->title =  $_POST['title'];;
    $data->services = $_POST['services'];
    R::store($data);
}
//------------------view all data-------------------

$all =  R::findAll('about');

foreach($all as $a)
{
    require BACK . '/AdminAbout.html';
}
