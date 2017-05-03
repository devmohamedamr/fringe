<?php
session_start();
session_destroy();
//----------------logout -----------
header('LOCATION:login.php');