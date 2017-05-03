<?php
require 'index.php';

$data =  R::findAll('home');
$contact =  R::findAll('contact');
foreach ($data as $d)
{
    require FRONT . '/index.html';

}
