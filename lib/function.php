<?php

function check(){
    return (isset($_SESSION['user']))? true :false;
}