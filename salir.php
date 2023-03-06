<?php require_once 'helpers.php';
    Helper::removeSession('persona');
    header('Location:index.php');
?>