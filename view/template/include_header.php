<?php 
session_start();

if($_SESSION['auth']){
    include dirname( __FILE__).'/header2.php';
}else{
    include dirname( __FILE__).'/header1.php';
}

?>
