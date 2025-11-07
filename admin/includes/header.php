<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/core.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Climate Hub| Admin Panel</title>
  <link href="../images/UNFCCC_logo.svg" rel="shortcut icon">
  
  <!-- Bootstrap core CSS-->
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../assets/custom/custom.css" rel="stylesheet">
  <link href="../assets/custom/fpdf.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Climate Hub | Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link" href="laporan.php">
            <i class="fa fa-fw fa-comments"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Masyarakat">
          <a class="nav-link" href="masyarakat.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Masyarakat</span>
          </a>
        </li>
        <?php 
            if ($_SESSION['level']==1) {
        ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Petugas">
          <a class="nav-link" href="petugas.php">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Petugas</span>
          </a>
        </li>
        <?php 
            }
        ?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler" >
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>