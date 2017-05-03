<?php
//root
define('ROOT',dirname(__FILE__));
define('DESIGN',ROOT.'/Design');
define('FRONT',DESIGN.'/front');
define('BACK',DESIGN.'/back');
define('ADMIN',ROOT.'/Admin');
define('LIB',ROOT.'/lib');
define('ASSETS',FRONT.'assets');
//REQUIRE FILES
require LIB.'/rb.php';
require LIB.'/Validation.php';
require LIB.'/function.php';
require LIB.'/upload.class.php';
require LIB.'/translate/translate.php';
//CONNECT WITH DB
R::setup( 'mysql:host=localhost;dbname=fringe', 'root', '' );
