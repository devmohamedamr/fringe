<?php
require 'index.php';

$data =  R::findAll('about');
$contact =  R::findAll('contact');
$interest = R::findAll('interest');

foreach($data as $d)
{
    require FRONT . '/about.html';
}
