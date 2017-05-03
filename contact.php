<?php
require 'index.php';


$data =  R::findAll('contact');
foreach($data as $d) {
    require FRONT . '/contact.html';
}

