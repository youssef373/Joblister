<?php
//Session Start
session_start();
require_once 'helper.php';

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});