<?php 
date_default_timezone_set('America/Port-au-Prince');
session_start();
require 'vendor/User.php';
require 'vendor/Online.php';
require 'vendor/Message.php';

if($_SERVER['REQUEST_URI'] === '/index.php'){
  if(isset($_SESSION['pseudo'])) header('Location: chatapp.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="This is my Personal and profesionnal website, i build it to share my experiences with the world">
  <meta name="author" content="Jean Pierre Louis Peterson">

  <title>Chat App</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  

</head>

<body >

  <!-- Navbar start -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Chat App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                  <?php if(isset($_SESSION['pseudo'])): ?>
                    <a class="nav-link active text-white" aria-current="page" href="logout.php">Deconnection-<?=$_SESSION['pseudo']?></a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </nav>
  <!-- Navbar end -->