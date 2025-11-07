<?php

session_start();
include_once 'db_connect.php';

if (empty($_SESSION['id_petugas'])) {
  header ("location:index.php");
}

 ?>
