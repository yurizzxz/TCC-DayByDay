<?php
//trava de login
(!isset($_SESSION) ? session_start() : "");

if ($_SESSION['acesso'] != 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {
    header('location:logout.php');
}
/*
 * se start_login existir na sessão
 * se o time atual menos o time armazenado na sessão for maior que 300
 */

if (isset($_SESSION['start_login']) && (time() - $_SESSION['start_login'] > 300000000)) {
    header("location:logout.php");
}

$_SESSION['start_login'] = time();

