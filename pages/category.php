<?php
include UC_ROOT.'/db.php';
include_once UC_ROOT.'/db_functions.php';

if ($_GET['brandsMode']) {
    $_SESSION['brands'] = true;
}



$_SESSION['selectedCategory']= $_GET['category'];
displayCategory($_SESSION['selectedCategory']);

